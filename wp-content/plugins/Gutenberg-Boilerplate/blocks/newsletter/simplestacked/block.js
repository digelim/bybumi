import {
  repeaterData,
  RepeaterControl,
} from '../../../gutenberg-repeater-control/index.js';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText,InspectorControls } = wp.blockEditor;

const {
  PanelBody,
  PanelRow,
  ToggleControl,
  TextControl,
  TextareaControl,
  RadioControl,
} = wp.components;

const name = "gb/simplestackednewsletter";

registerBlockType(name, {
  title: __("Simple Stacked", "GB"),
  icon: (
    <img src="data:image/png;base64,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" />
  ),
  category: "newsletter",
  attributes: {
    method: {
      type: "string",
      default: "GET",
    },
    action: {
      type: "string",
      default: "",
    },
    message: {
      type: "string",
      default: "",
    },
    subject: {
      type: "string",
      default: "",
    },
    to: {
      type: "string",
      default: "",
    },
    hidden: {
      type: "string|array",
      source: "attribute",
      selector: "select",
      attribute: "hidden",
      default: [],
    },    
    contentUA: { type: "string", default: `Want product news and updates?` },
    contentt: { type: "string", default: `Sign up for our newsletter.` },
    contentUB: { type: "string", default: `Email address` },
    contentUC: { type: "string", default: `Notify me` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;
    const { send } = attributes;

    return (
      <div className="bg-white">
         <InspectorControls>
          <PanelBody title="Email settings">
            <PanelRow>
              <ToggleControl
                label="Send email"
                checked={send}
                onChange={() => setAttributes({ send: !send })}
              />
            </PanelRow>
            {send ? (
              <div>
                <PanelRow>
                  <TextControl
                    label="To"
                    value={attributes.to}
                    onChange={(to) => setAttributes({to})}
                  />
                </PanelRow>
                <PanelRow>
                  <TextControl
                    label="Subject"
                    value={attributes.subject}
                    onChange={(subject) => setAttributes({subject})}
                  />
                </PanelRow>
                <PanelRow>
                  <TextareaControl
                    label="Message"
                    value={attributes.message}
                    onChange={(message) => setAttributes({message})}
                  />
                </PanelRow>
              </div>
            ) : (
              ""
            )}
          </PanelBody>
          <PanelBody title="Form settings">
            <PanelRow>
              <RadioControl
                label="Method"
                selected={attributes.method}
                options={[
                  { label: "GET", value: "GET" },
                  { label: "POST", value: "POST" },
                ]}
                onChange={(method) => setAttributes({ method })}
              />
            </PanelRow>
            <PanelRow>
              <TextControl
                label="Action"
                onChange={(action) => setAttributes({ action })}
              />
            </PanelRow>

            <PanelRow>
              <b>Hidden fields</b>
            </PanelRow>
            <PanelRow>
              <RepeaterControl
                max={5}
                value={props.attributes.hidden}
                onChange={(val) => {
                  props.setAttributes({ hidden: val });
                }}
              >
                {(value, onChange) => {
                  return [
                    <TextControl
                      label="Name"
                      value={value.name}
                      onChange={(v) => {
                        value.name = v;
                        onChange(value);
                      }}
                    />,
                    <TextControl
                      label="Value"
                      value={value.val}
                      onChange={(v) => {
                        value.val = v;
                        onChange(value);
                      }}
                    />,
                  ];
                }}
              </RepeaterControl>
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
          
          <h2 className="inline text-3xl font-extrabold tracking-tight text-gray-900 sm:block sm:text-4xl">
            <RichText
              value={attributes.contentUA}
              default={"Want product news and updates?"}
              onChange={(newtext) => setAttributes({ contentUA: newtext })}
            />
          </h2>
          <p className="inline text-3xl font-extrabold tracking-tight text-indigo-600 sm:block sm:text-4xl">
            <RichText
              value={attributes.contentt}
              default={"Sign up for our newsletter."}
              onChange={(newtext) => setAttributes({ contentt: newtext })}
            />
          </p>
          <form className="mt-8 sm:flex">
            
            <label for="email-address" className="sr-only">
              <RichText
                value={attributes.contentUB}
                default={"Email address"}
                onChange={(newtext) => setAttributes({ contentUB: newtext })}
              />
            </label>
            <input
              id="email-address"
              name="email"
              type="email"
              autocomplete="email"
              required
              className="w-full px-5 py-3 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md"
              placeholder="Enter your email"
            />
            <div className="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
              
              <button
                type="submit"
                className="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                <RichText
                  value={attributes.contentUC}
                  default={"Notify me"}
                  onChange={(newtext) =>
                    setAttributes({ contentUC: newtext })
                  }
                />
              </button>
            </div>
          </form>
        </div>
      </div>
    );
  },
  save: function (props) {
    const { attributes } = props;
    const arData = repeaterData(props.attributes.hidden, true);

    return (
      <div class="bg-white">
        
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
          
          <h2 class="inline text-3xl font-extrabold tracking-tight text-gray-900 sm:block sm:text-4xl">
           <RichText.Content value={attributes.contentUA}/>
          </h2>
          <p class="inline text-3xl font-extrabold tracking-tight text-indigo-600 sm:block sm:text-4xl">
           <RichText.Content value={attributes.contentt}/>
          </p>
          <form 
            class="mt-8 sm:flex"
            action={attributes.action}
            method={attributes.method}
          >
            {arData.map((v) => {
              return <input type="hidden" name={v.name} value={v.val} />;
            })}

            <label for="email-address" class="sr-only">
             <RichText.Content value={attributes.contentUB}/>
            </label>
            <input
              id="email-address"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="w-full px-5 py-3 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md"
              placeholder="Enter your email"
            />
            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
              
              <button
                type="submit"
                onclick={`sendEmail('${name}'); return false;`}
                class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
               <RichText.Content value={attributes.contentUC}/>
              </button>
            </div>
          </form>
        </div>
      </div>
    );
  },
});
