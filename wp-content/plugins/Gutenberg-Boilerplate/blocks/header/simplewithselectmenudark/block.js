const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

registerBlockType("gb/simplewithselectmenudark", {
  title: __("Simple With Select Menu Dark", "GB"),
  icon: (
    <img src="data:image/png;base64,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" />
  ),
  category: "header",
  attributes: {
    contentt: { type: "string", default: `Pricing Plans` },
    contentUA: {
      type: "string",
      default: `Start building for free, then add a site plan to go live. Account plans unlock additional features.`,
    },
    contentUB: { type: "string", default: `Currency` },
    contentUC: { type: "string", default: `Argentina (ARS)` },
    contentUD: { type: "string", default: `Australia (AUD)` },
    contentUE: { type: "string", default: `United States (USD)` },
    contentUF: { type: "string", default: `Canada (CAD)` },
    contentUG: { type: "string", default: `France (EUR)` },
    contentUH: { type: "string", default: `Japan (JPY)` },
    contentUI: { type: "string", default: `Nigeria (NGN)` },
    contentUJ: { type: "string", default: `Switzerland (CHF)` },
    contentUK: { type: "string", default: `United Kingdom (GBP)` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <div className="bg-gray-800">
        
        <div className="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between">
          
          <div className="max-w-xl">
            
            <h2 className="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">
              <RichText
                value={attributes.contentt}
                default={"Pricing Plans"}
                onChange={(newtext) => setAttributes({ contentt: newtext })}
              />
            </h2>
            <p className="mt-5 text-xl text-gray-400">
              <RichText
                value={attributes.contentUA}
                default={
                  "Start building for free, then add a site plan to go live. Account plans unlock additional features."
                }
                onChange={(newtext) => setAttributes({ contentUA: newtext })}
              />
            </p>
          </div>
          <div className="mt-10 w-full max-w-xs">
            
            <label
              for="currency"
              className="block text-base font-medium text-gray-300"
            >
              <RichText
                value={attributes.contentUB}
                default={"Currency"}
                onChange={(newtext) => setAttributes({ contentUB: newtext })}
              />
            </label>
            <div className="mt-1.5 relative">
              
              <select
                id="currency"
                name="currency"
                className="appearance-none block w-full bg-none bg-gray-700 border border-transparent rounded-md pl-3 pr-10 py-2 text-base text-white focus:outline-none focus:ring-1 focus:ring-white focus:border-white sm:text-sm"
              >
                
                <option>
                  <RichText
                    value={attributes.contentUC}
                    default={"Argentina (ARS)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUC: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUD}
                    default={"Australia (AUD)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUD: newtext })
                    }
                  />
                </option>
                <option selected>
                  <RichText
                    value={attributes.contentUE}
                    default={"United States (USD)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUE: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUF}
                    default={"Canada (CAD)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUF: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUG}
                    default={"France (EUR)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUG: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUH}
                    default={"Japan (JPY)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUH: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUI}
                    default={"Nigeria (NGN)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUI: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUJ}
                    default={"Switzerland (CHF)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUJ: newtext })
                    }
                  />
                </option>
                <option>
                  <RichText
                    value={attributes.contentUK}
                    default={"United Kingdom (GBP)"}
                    onChange={(newtext) =>
                      setAttributes({ contentUK: newtext })
                    }
                  />
                </option>
              </select>
              <div className="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                
                <svg
                  className="h-4 w-4 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <div class="bg-gray-800">
        
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between">
          
          <div class="max-w-xl">
            
            <h2 class="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">
             <RichText.Content value={attributes.contentt}/>
            </h2>
            <p class="mt-5 text-xl text-gray-400">{attributes.contentUA} </p>
          </div>
          <div class="mt-10 w-full max-w-xs">
            
            <label
              for="currency"
              class="block text-base font-medium text-gray-300"
            >
             <RichText.Content value={attributes.contentUB}/>
            </label>
            <div class="mt-1.5 relative">
              
              <select
                id="currency"
                name="currency"
                class="appearance-none block w-full bg-none bg-gray-700 border border-transparent rounded-md pl-3 pr-10 py-2 text-base text-white focus:outline-none focus:ring-1 focus:ring-white focus:border-white sm:text-sm"
              >
                
                <option>{attributes.contentUC} </option>
                <option>{attributes.contentUD} </option>
                <option selected>{attributes.contentUE} </option>
                <option>{attributes.contentUF} </option>
                <option>{attributes.contentUG} </option>
                <option>{attributes.contentUH} </option>
                <option>{attributes.contentUI} </option>
                <option>{attributes.contentUJ} </option>
                <option>{attributes.contentUK} </option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                
                <svg
                  class="h-4 w-4 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  },
});
