let aafw_billing_map;
let aafw_billing_autocomplete;
let aafw_billing_address_1;
let aafw_billing_marker;
let aafw_billing_infowindow;
let aafw_billing_map_exist = false;

let aafw_shipping_map;
let aafw_shipping_autocomplete;
let aafw_shipping_address_1;
let aafw_shipping_marker;
let aafw_shipping_infowindow;
let aafw_shipping_map_exist = false;

let aafw_pickup_map;
let aafw_pickup_autocomplete;
let aafw_pickup_address_1;
let aafw_pickup_marker;
let aafw_pickup_infowindow;
let aafw_pickup_map_exist = false;

let aafw_current_place;
let aafw_geocoder;
let aafw_place;
let aafw_formatted_address;
let aafw_pos;
let aafw_map_zoom = parseInt(aafw_autocomplete.aafw_map_zoom);

(function($) {
    'use strict';
})(jQuery);

    function aafw_initMap() {

        if (jQuery("#aafw_pickup_map").length) {
            aafw_pickup_map_exist = true;
        }

        if (jQuery("#aafw_shipping_map").length) {
            aafw_shipping_map_exist = true;
        }

        if (jQuery("#aafw_billing_map").length) {
            aafw_billing_map_exist = true;
        }

        aafw_console_log("aafw_initMap");
        aafw_geocoder = new google.maps.Geocoder();
        if (aafw_shipping_map_exist) {
            aafw_shipping_map = new google.maps.Map(document.getElementById("aafw_shipping_map"), {
                center: { lat: parseFloat(aafw_autocomplete.aafw_center_map_latitude), lng: parseFloat(aafw_autocomplete.aafw_center_map_longitude) },
                zoom: aafw_map_zoom,
            });
            aafw_shipping_infowindow = new google.maps.InfoWindow({ size: new google.maps.Size(150, 50) });
        }

        if (aafw_billing_map_exist) {
            aafw_billing_map = new google.maps.Map(document.getElementById("aafw_billing_map"), {
                center: { lat: parseFloat(aafw_autocomplete.aafw_center_map_latitude), lng: parseFloat(aafw_autocomplete.aafw_center_map_longitude) },
                zoom: aafw_map_zoom,
            });
            aafw_billing_infowindow = new google.maps.InfoWindow({ size: new google.maps.Size(150, 50) });
        }

        if (aafw_pickup_map_exist) {
            aafw_pickup_map = new google.maps.Map(document.getElementById("aafw_pickup_map"), {
                center: { lat: parseFloat(aafw_autocomplete.aafw_center_map_latitude), lng: parseFloat(aafw_autocomplete.aafw_center_map_longitude) },
                zoom: aafw_map_zoom,
            });
            aafw_pickup_infowindow = new google.maps.InfoWindow({ size: new google.maps.Size(150, 50) });
        }

        var set_marker_customer_location = false;
        

        if (set_marker_customer_location == false) {
            var marker_latlng = parseFloat(aafw_autocomplete.aafw_center_map_latitude) + "," + parseFloat(aafw_autocomplete.aafw_center_map_longitude);
            aafw_geocodeLatLng(aafw_geocoder, aafw_billing_map, aafw_billing_infowindow, marker_latlng, 'all', 'dragend', false);
        }
    }

    function aafw_initAutocomplete() {
        aafw_console_log("aafw_initAutocomplete");

        if (jQuery("#billing_address_1").length || jQuery("#aafw_shipping_map").length || jQuery("#aafw_pickup_map").length) {
        } else {
            return false;
        }

        if (aafw_autocomplete.aafw_map == "1") {
            aafw_initMap();
        }

        //Billing
        if (jQuery("#billing_address_1").length && aafw_autocomplete.aafw_billing == "1") {
            aafw_billing_address_1 = document.querySelector("#billing_address_1");

            aafw_billing_autocomplete = new google.maps.places.Autocomplete(aafw_billing_address_1, {

            });
            if (aafw_autocomplete.aafw_restrictions != "") {
                aafw_billing_autocomplete.setComponentRestrictions({ country: aafw_autocomplete.aafw_restrictions });
            }
            //aafw_billing_address_1.focus();
            aafw_billing_autocomplete.addListener("place_changed",
                function() {
                    aafw_place = aafw_billing_autocomplete.getPlace();
                    aafw_console_log("place_changed");

                    aafw_fillInAddress(aafw_place, 'billing');
                    aafw_pos = aafw_place.geometry.location;
                    aafw_formatted_address = aafw_place.formatted_address;
                    if (aafw_autocomplete.aafw_map == "1") {
                        aafw_show_marker_on_map(aafw_pos, aafw_place, aafw_billing_map, 'billing', '');
                    }
                    jQuery(document.body).trigger('update_checkout');
                });
        }

        //Shipping
        if (jQuery("#shipping_address_1").length && aafw_autocomplete.aafw_shipping == "1") {
            aafw_shipping_address_1 = document.querySelector("#shipping_address_1");
            aafw_shipping_autocomplete = new google.maps.places.Autocomplete(aafw_shipping_address_1, {

            });
            if (aafw_autocomplete.aafw_restrictions != "") {
                aafw_shipping_autocomplete.setComponentRestrictions({ country: aafw_autocomplete.aafw_restrictions });
            }
            //aafw_shipping_address_1.focus();
            aafw_shipping_autocomplete.addListener("place_changed",
                function() {
                    aafw_place = aafw_shipping_autocomplete.getPlace();
                    aafw_console_log("place_changed");

                    aafw_fillInAddress(aafw_place, 'shipping');
                    aafw_pos = aafw_place.geometry.location;
                    aafw_formatted_address = aafw_place.formatted_address;
                    if (aafw_autocomplete.aafw_map == "1") {
                        aafw_show_marker_on_map(aafw_pos, aafw_place, aafw_shipping_map, 'shipping', '');
                    }
                    jQuery(document.body).trigger('update_checkout');
                });
        }

        //pickup
        if (jQuery("#pickup_address_1").length && aafw_autocomplete.aafw_pickup == "1") {
            aafw_pickup_address_1 = document.querySelector("#pickup_address_1");
            aafw_pickup_autocomplete = new google.maps.places.Autocomplete(aafw_pickup_address_1, {

            });
            if (aafw_autocomplete.aafw_restrictions != "") {
                aafw_pickup_autocomplete.setComponentRestrictions({ country: aafw_autocomplete.aafw_restrictions });
            }
            //aafw_pickup_address_1.focus();
            aafw_pickup_autocomplete.addListener("place_changed",
                function() {
                    aafw_place = aafw_pickup_autocomplete.getPlace();
                    aafw_console_log("place_changed");

                    aafw_fillInAddress(aafw_place, 'pickup');
                    aafw_pos = aafw_place.geometry.location;
                    aafw_formatted_address = aafw_place.formatted_address;
                    if (aafw_autocomplete.aafw_map == "1") {
                        aafw_show_marker_on_map(aafw_pos, aafw_place, aafw_pickup_map, 'pickup', '');
                    }
                    jQuery(document.body).trigger('update_checkout');
                });
        }

    }

    function aafw_show_marker_on_map(pos, aafw_place, map, address_type, event_type, show_infowindow = true) {
        aafw_console_log('aafw_show_marker_on_map ' + address_type + ' ' + event_type);

        aafw_formatted_address = aafw_place.formatted_address
        if (address_type == "all") {
            if (aafw_billing_map_exist) {
                aafw_show_marker_on_map(pos, aafw_place, aafw_billing_map, 'billing', event_type, show_infowindow);
            }
            if (aafw_shipping_map_exist) {
                aafw_show_marker_on_map(pos, aafw_place, aafw_shipping_map, 'shipping', event_type, show_infowindow)
            }

            if (aafw_pickup_map_exist) {
                aafw_show_marker_on_map(pos, aafw_place, aafw_pickup_map, 'pickup', event_type, show_infowindow)
            }
            return true;
        }

        var aafw_draggable = false;
        

        var aafw_infowindow_content = aafw_formatted_address;

        // Add choose address button.
        aafw_current_place = "";
        if (event_type == "dragend") {
            aafw_current_place = aafw_place;
            if (aafw_autocomplete.aafw_location_picker_type != '2') {
                aafw_infowindow_content = aafw_infowindow_content + '<div class="aafw_marker"><button class="aafw_set_address_btn" type="button" onclick="aafw_set_address_from_marker(\'' + address_type + '\');">' + aafw_autocomplete.aafw_select_address_text + '</button></div>';
            }
            if (aafw_autocomplete.aafw_location_picker_type != '1') {
                aafw_infowindow_content = aafw_infowindow_content + '<div class="aafw_marker"><button class="aafw_set_location_btn" type="button" onclick="aafw_set_location_from_marker(\'' + address_type + '\');">' + aafw_autocomplete.aafw_select_location_text + '</button></div>';
            }

        }

        if (address_type == 'pickup' && aafw_pickup_map_exist) {
            map.panTo(pos);
            aafw_pickup_infowindow.setContent(aafw_infowindow_content);

            if (!aafw_pickup_marker) {
                aafw_pickup_marker = new google.maps.Marker({
                    position: pos,
                    map,
                    draggable: aafw_draggable
                });
                




            } else {
                aafw_pickup_marker.setPosition(pos);

            }
            if (show_infowindow) {
                aafw_pickup_infowindow.open(map, aafw_pickup_marker);
                map.addListener("zoom_changed", () => {
                    aafw_pickup_infowindow.close();
                });
            }

        }

        if (address_type == 'shipping' && aafw_shipping_map_exist) {
            map.panTo(pos);
            aafw_shipping_infowindow.setContent(aafw_infowindow_content);

            if (!aafw_shipping_marker) {
                aafw_shipping_marker = new google.maps.Marker({
                    position: pos,
                    map,
                    draggable: aafw_draggable
                });
                




            } else {
                aafw_shipping_marker.setPosition(pos);

            }
            if (show_infowindow) {
                aafw_shipping_infowindow.open(map, aafw_shipping_marker);
                map.addListener("zoom_changed", () => {
                    aafw_shipping_infowindow.close();
                });
            }

        }

        if (address_type == 'billing' && aafw_billing_map_exist) {
            map.panTo(pos);
            aafw_billing_infowindow.setContent(aafw_infowindow_content);
            if (!aafw_billing_marker) {
                aafw_billing_marker = new google.maps.Marker({
                    position: pos,
                    map,
                    draggable: aafw_draggable
                });
                



            } else {
                aafw_billing_marker.setPosition(pos);

            }

            if (show_infowindow) {
                aafw_billing_infowindow.open(map, aafw_billing_marker);
                map.addListener("zoom_changed", () => {
                    aafw_billing_infowindow.close();
                });
            }

        }


    }

    function aafw_geocodeLatLng(aafw_geocoder, map, infowindow, marker_latlng, address_type, event_type, show_content = true) {
        aafw_console_log("aafw_geocodeLatLng");
        const input = marker_latlng;
        const latlngStr = input.split(",", 2);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        aafw_geocoder.geocode({ location: latlng })
            .then((response) => {
                if (response.results[0]) {

                    if (event_type != "dragend") {
                        // Update address on autocomplete only.
                        aafw_fillInAddress(response.results[0], address_type);
                        jQuery(document.body).trigger('update_checkout');
                    }

                    if (aafw_autocomplete.aafw_map == "1") {
                        // Show marker on map.
                        aafw_show_marker_on_map(latlng, response.results[0], map, address_type, event_type, show_content);
                    }
                } else {
                    aafw_console_log("No results found");
                }
            })
            .catch((e) => aafw_console_log("Geocoder failed due to: " + e));
    }

    





function aafw_console_log(data) {
   // console.log(data);
}

function aafw_set_address_from_marker(address_type) {
    aafw_console_log('aafw_set_address_from_marker');
    aafw_fillInAddress(aafw_current_place, address_type);
    jQuery(".aafw_set_address_btn").replaceWith("<svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"check\" class=\"svg-inline--fa fa-check fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z\"></path></svg>" + "<span class=\"aafw_marker_text\">" + aafw_autocomplete.aafw_address_selected_text + "</span>");
    jQuery(".aafw_set_location_btn").replaceWith("");
    jQuery(document.body).trigger('update_checkout');
}

function aafw_set_location_from_marker(address_type) {
    aafw_console_log('aafw_set_location_from_marker');
    aafw_set_location(aafw_current_place, address_type);
    jQuery(".aafw_set_location_btn").replaceWith("<svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"check\" class=\"svg-inline--fa fa-check fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z\"></path></svg>" + "<span class=\"aafw_marker_text\">" + aafw_autocomplete.aafw_location_selected_text + "</span>");
}


function aafw_fillInAddress(aafw_place, address_type) {
    aafw_console_log("aafw_fillInAddress " + address_type);


    if (address_type == "all") {
        aafw_fillInAddress(aafw_place, 'billing');
        aafw_fillInAddress(aafw_place, 'shipping');
        aafw_fillInAddress(aafw_place, 'pickup');
        return true;
    }
    aafw_console_log(aafw_place);
    let aafw_address1 = "";
    let aafw_postcode = "";
    let aafw_city = "";
    let aafw_country = "";
    let aafw_state = "";
    let aafw_state_name = "";
    let aafw_state_found = false;
    let aafw_number = "";
    let aafw_subpremise = "";

    for (const component of aafw_place.address_components) {
        const componentType = component.types[0];
        switch (componentType) {
            case "street_number":
                aafw_number = component.long_name;
                break;
            case "subpremise":
            case "premise":
                aafw_subpremise = component.long_name;
                break;
            case "route":
                aafw_address1 += component.short_name;
                break;

            case "postal_code":
                aafw_postcode = `${component.long_name}${aafw_postcode}`;
                break;

            case "postal_code_suffix":
                //aafw_postcode = `${aafw_postcode}-${component.long_name}`;
                break;


            case "political":
            case "administrative_area_level_3":
                if (aafw_city == '') {
                    aafw_city = component.long_name;
                }
                break;

            case "sublocality":
            case "sublocality_level_1":
            case "locality":
            case "postal_town":
                aafw_city = component.long_name;
                break;

            case "administrative_area_level_1":
                aafw_state = component.short_name;
                aafw_state_name = component.long_name;
                break;

            case "country":
            case 'administrative_area_level_2':
                aafw_country = component.short_name;
                break;
        }
    }

    if (aafw_address1 == '') {
        aafw_address1 = aafw_place.formatted_address;
    } else {


        if (aafw_subpremise != '') {

            if (aafw_number != '') {
                aafw_number = aafw_subpremise + '/' + aafw_number;
            }  else {
                aafw_number = aafw_subpremise;
            }

        }

        if (aafw_number != '') {
            if (aafw_autocomplete.aafw_address_format == '2') {
                aafw_address1 = aafw_address1 + ' ' + aafw_number;
            } else {
                aafw_address1 = aafw_number + ' ' + aafw_address1;
            }
        }

    }

    if (address_type == 'billing') {
        jQuery("#billing_address_1").val(aafw_address1);
        jQuery("#billing_postcode").val(aafw_postcode);
        jQuery("#billing_city").val(aafw_city);


        if (jQuery("#billing_state_field").is(":visible")) {
            if (jQuery("select#billing_state").length) {

                aafw_state_found = false;
                jQuery('#billing_state > option').each(function() {
                    if (jQuery(this).val() == aafw_state && aafw_state != "") {
                        jQuery("#billing_state").val(aafw_state).trigger("change");
                        aafw_state_found = true;
                    }
                });
                if (aafw_state_found == false) {
                    jQuery('#billing_state > option').each(function() {
                        if (jQuery(this).text() == aafw_state_name && aafw_state_name != "") {
                            jQuery("#billing_state").val(jQuery(this).val()).trigger("change");
                            aafw_state_found = true;
                        }
                    });
                }

            } else {
                jQuery("#billing_state").val(aafw_state);
            }

        } else {
            jQuery("#billing_state").val("");
        }

        jQuery("#billing_address_2").val("");
        jQuery("#billing_country").val(aafw_country).trigger("change");
       
        aafw_set_location(aafw_place, address_type);


    }

    if (address_type == 'shipping') {
        jQuery("#shipping_address_1").val(aafw_address1);
        jQuery("#shipping_postcode").val(aafw_postcode);
        jQuery("#shipping_city").val(aafw_city);

        if (jQuery("#shipping_state_field").is(":visible")) {
            if (jQuery("select#shipping_state").length) {

                aafw_state_found = false;
                jQuery('#shipping_state > option').each(function() {
                    if (jQuery(this).val() == aafw_state && aafw_state != "") {
                        jQuery("#shipping_state").val(aafw_state).trigger("change");
                        aafw_state_found = true;
                    }
                });
                if (aafw_state_found == false) {
                    jQuery('#shipping_state > option').each(function() {
                        if (jQuery(this).text() == aafw_state_name && aafw_state_name != "") {
                            jQuery("#shipping_state").val(jQuery(this).val()).trigger("change");
                            aafw_state_found = true;
                        }
                    });
                }

            } else {
                jQuery("#shipping_state").val(aafw_state);
            }

        } else {
            jQuery("#shipping_state").val("");
        }

        jQuery("#shipping_country").val(aafw_country).trigger("change");

        aafw_set_location(aafw_place, address_type);

        jQuery("#shipping_address_2").val("");

    }

    if (address_type == 'pickup') {
        jQuery("#pickup_address_1").val(aafw_address1);
        jQuery("#pickup_postcode").val(aafw_postcode);
        jQuery("#pickup_city").val(aafw_city);

        if (jQuery("#pickup_state_field").is(":visible")) {
            if (jQuery("select#pickup_state").length) {

                aafw_state_found = false;
                jQuery('#pickup_state > option').each(function() {
                    if (jQuery(this).val() == aafw_state && aafw_state != "") {
                        jQuery("#pickup_state").val(aafw_state).trigger("change");
                        aafw_state_found = true;
                    }
                });
                if (aafw_state_found == false) {
                    jQuery('#pickup_state > option').each(function() {
                        if (jQuery(this).text() == aafw_state_name && aafw_state_name != "") {
                            jQuery("#pickup_state").val(jQuery(this).val()).trigger("change");
                            aafw_state_found = true;
                        }
                    });
                }

            } else {
                jQuery("#pickup_state").val(aafw_state);
            }

        } else {
            jQuery("#pickup_state").val("");
        }

        jQuery("#pickup_country").val(aafw_country).trigger("change");

        aafw_set_location(aafw_place, address_type);

        jQuery("#pickup_address_2").val("");

    }


}


function aafw_set_location(aafw_place, address_type) {
    aafw_console_log("aafw_set_location " + address_type);


    if (address_type == "all") {
        aafw_set_location(aafw_place, 'billing');
        aafw_set_location(aafw_place, 'shipping');
        aafw_set_location(aafw_place, 'pickup');
        return true;
    }
    aafw_console_log(aafw_place);
    aafw_pos = aafw_place.geometry.location;
    if (address_type == 'billing') {
        if (aafw_autocomplete.aafw_coordinates == '1') {
            if (jQuery("#aafw_billing_lat").length) {
                jQuery("#aafw_billing_lat").html(aafw_pos.lat);
                jQuery("#aafw_billing_lng").html(aafw_pos.lng);
                jQuery("#aafw_billing_lng_input").val(aafw_pos.lng);
                jQuery("#aafw_billing_lat_input").val(aafw_pos.lat);
                jQuery(".woocommerce-billing-fields .aafw_coordinates").show();
            }
        }
    }

    if (address_type == 'shipping') {
        if (aafw_autocomplete.aafw_coordinates == '1') {
            if (jQuery("#aafw_shipping_lat").length) {
                jQuery("#aafw_shipping_lat").html(aafw_pos.lat);
                jQuery("#aafw_shipping_lng").html(aafw_pos.lng);
                jQuery("#aafw_shipping_lng_input").val(aafw_pos.lng);
                jQuery("#aafw_shipping_lat_input").val(aafw_pos.lat);
                jQuery(".woocommerce-shipping-fields .aafw_coordinates").show();
            }
        }
    }

    if (address_type == 'pickup') {
        if (aafw_autocomplete.aafw_coordinates == '1') {
            if (jQuery("#aafw_pickup_lat").length) {
                jQuery("#aafw_pickup_lat").html(aafw_pos.lat);
                jQuery("#aafw_pickup_lng").html(aafw_pos.lng);
                jQuery("#aafw_pickup_lng_input").val(aafw_pos.lng);
                jQuery("#aafw_pickup_lat_input").val(aafw_pos.lat);
                jQuery(".pickup_address  .aafw_coordinates").show();
            }
        }
    }
}