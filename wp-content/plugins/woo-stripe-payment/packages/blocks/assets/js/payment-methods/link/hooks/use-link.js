import {useEffect, useState, useRef} from '@wordpress/element';
import {useStripe, useElements} from "@stripe/react-stripe-js";
import {toCartAddress as mapToCartAddress, ensureSuccessResponse, ensureErrorResponse, getBillingDetailsFromAddress} from '../../util';

const toCartAddress = mapToCartAddress();

export const useLink = (
    {
        email,
        eventRegistration,
        onClick,
        onSubmit,
        activePaymentMethod,
        responseTypes,
        ...props
    }) => {
    const [link, setLink] = useState();
    const stripe = useStripe();
    const elements = useElements();
    const currentData = useRef();
    const linkData = useRef();
    const {onPaymentProcessing} = eventRegistration;
    useEffect(() => {
        currentData.current = {onClick, onSubmit}
    });

    useEffect(() => {
        if (stripe && elements && !link) {
            setLink(stripe?.linkAutofillModal(elements));
        }
    }, [
        stripe,
        elements,
        link
    ]);

    useEffect(() => {
        if (link) {
            link.launch({email});
        }
    }, [link, email]);

    useEffect(() => {
        if (link) {
            link.on('autofill', event => {
                linkData.current = event;
                currentData.current.onSubmit();

            });
            link.on('authenticated', event => {
                currentData.current.onClick();
            })
        }
    }, [link]);

    useEffect(() => {
        const unsubscribe = onPaymentProcessing(async () => {
            if (activePaymentMethod !== 'stripe_link_checkout') {
                return null;
            }
            const response = {meta: {}};
            const {shippingAddress = null, billingAddress = null} = linkData.current.value;
            if (billingAddress) {
                response.meta.billingData = toCartAddress({...billingAddress.address, recipient: billingAddress.name});
                response.meta.billingAddress = response.meta.billingData;
            }
            if (shippingAddress) {
                response.meta.shippingData = {address: toCartAddress({...shippingAddress.address, recipient: shippingAddress.name})};
            }
            // update the payment intent
            try {
                const result = await stripe.createPaymentMethod({
                    elements,
                    params: {
                        billing_details: getBillingDetailsFromAddress(response.meta.billingData)
                    }
                });
                if (result.error) {
                    throw result.error;
                }
                response.meta.paymentMethodData = {
                    stripe_cc_token_key: result.paymentMethod.id,
                    stripe_cc_save_source_key: false,
                }
                return ensureSuccessResponse(responseTypes, response);
            } catch (error) {
                console.log(error);
                return ensureErrorResponse(responseTypes, error);
            }
        });

        return () => unsubscribe();
    }, [
        onPaymentProcessing,
        stripe,
        elements,
        activePaymentMethod
    ]);

    return link;
}