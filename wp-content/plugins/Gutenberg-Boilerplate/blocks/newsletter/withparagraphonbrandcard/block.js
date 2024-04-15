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

const name = "gb/withparagraphonbrandcard";

registerBlockType(name, {
  title: __("With Paragraph On Brand Card", "GB"),
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
    contentt: {
      type: "string",
      default: `Sign up for our newsletter to stay up to date.`,
    },
    contentUB: { type: "string", default: `Email address` },
    contentUC: { type: "string", default: `Notify me` },
    contentUD: { type: "string", default: ` Privacy Policy. ` },
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
        <div className="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8">
          
          <div className="px-6 py-6 bg-indigo-700 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
            
            <div className="xl:w-0 xl:flex-1">
              
              <h2 className="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                <RichText
                  value={attributes.contentUA}
                  default={"Want product news and updates?"}
                  onChange={(newtext) =>
                    setAttributes({ contentUA: newtext })
                  }
                />
              </h2>
              <p className="mt-3 max-w-3xl text-lg leading-6 text-indigo-200">
                <RichText
                  value={attributes.contentt}
                  default={"Sign up for our newsletter to stay up to date."}
                  onChange={(newtext) => setAttributes({ contentt: newtext })}
                />
              </p>
            </div>
            <div className="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
              
              <form 
                action={attributes.action}
                method={attributes.method}
                className="sm:flex">
                
                {arData.map((v) => {
                  return <input type="hidden" name={v.name} value={v.val} />;
                })}
               
                <label for="email-address" className="sr-only">
                  <RichText
                    value={attributes.contentUB}
                    default={"Email address"}
                    onChange={(newtext) =>
                      setAttributes({ contentUB: newtext })
                    }
                  />
                </label>
                <input
                  id="email-address"
                  name="email-address"
                  type="email"
                  autocomplete="email"
                  required
                  className="w-full border-white px-5 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white rounded-md"
                  placeholder="Enter your email"
                />
                <button
                  type="submit"
                  onclick={`sendEmail('${name}'); return false;`}
                  className="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent shadow text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0"
                >
                  <RichText
                    value={attributes.contentUC}
                    default={"Notify me"}
                    onChange={(newtext) =>
                      setAttributes({ contentUC: newtext })
                    }
                  />
                </button>
              </form>
              <p className="mt-3 text-sm text-indigo-200">
                
                We care about the protection of your data. Read our
                <a href="#" className="text-white font-medium underline">
                  <RichText
                    value={attributes.contentUD}
                    default={" Privacy Policy. "}
                    onChange={(newtext) =>
                      setAttributes({ contentUD: newtext })
                    }
                  />
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    );
  },
  save: function (props) {
    const { attributes } = props;
    const arData = repeaterData(props.attributes.hidden, true);

    return (
      <div class="bg-white">
        
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8">
          
          <div class="px-6 py-6 bg-indigo-700 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
            
            <div class="xl:w-0 xl:flex-1">
              
              <h2 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
               <RichText.Content value={attributes.contentUA}/>
              </h2>
              <p class="mt-3 max-w-3xl text-lg leading-6 text-indigo-200">
               <RichText.Content value={attributes.contentt}/>
              </p>
            </div>
            <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
              
              <form class="sm:flex">
                
                <label for="email-address" class="sr-only">
                 <RichText.Content value={attributes.contentUB}/>
                </label>
                <input
                  id="email-address"
                  name="email-address"
                  type="email"
                  autocomplete="email"
                  required
                  class="w-full border-white px-5 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white rounded-md"
                  placeholder="Enter your email"
                />
                <button
                  type="submit"
                  class="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent shadow text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0"
                >
                 <RichText.Content value={attributes.contentUC}/>
                </button>
              </form>
              <p class="mt-3 text-sm text-indigo-200">
                
                We care about the protection of your data. Read our
                <a
                  href={
                    attributes.contentUD.match('(.*?)href="(.*?)"(.*?)')
                      ? attributes.contentUD.match(
                          '(.*?)href="(.*?)"(.*?)'
                        )[2]
                      : attributes.contentUD
                  }
                  class="text-white font-medium underline"
                >
                  {attributes.contentUD.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")
                    ? attributes.contentUD.match(
                        "(?<=<.+.>)(.*?)(?=<.*/.+.?>)"
                      )[0]
                    : attributes.contentUD}
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    );
  },
});
