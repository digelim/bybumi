const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

registerBlockType("gb/simplecenteredcta", {
  title: __("Simple Centered", "GB"),
  icon: (
    <img src="data:image/png;base64,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" />
  ),
  category: "cta",
  attributes: {
    contentUA: { type: "string", default: `Ready to dive in?` },
    contentt: { type: "string", default: `Start your free trial today.` },
    contentUB: { type: "string", default: ` Get started ` },
    contentUC: { type: "string", default: ` Learn more ` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <div className="bg-white">
        
        <div className="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
          
          <h2 className="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            
            <span className="block">
              <RichText
                value={attributes.contentUA}
                default={"Ready to dive in?"}
                onChange={(newtext) => setAttributes({ contentUA: newtext })}
              />
            </span>
            <span className="block">
              <RichText
                value={attributes.contentt}
                default={"Start your free trial today."}
                onChange={(newtext) => setAttributes({ contentt: newtext })}
              />
            </span>
          </h2>
          <div className="mt-8 flex justify-center">
            
            <div className="inline-flex rounded-md shadow">
              
              <a
                href="#"
                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              >
                <RichText
                  value={attributes.contentUB}
                  default={" Get started "}
                  onChange={(newtext) =>
                    setAttributes({ contentUB: newtext })
                  }
                />
              </a>
            </div>
            <div className="ml-3 inline-flex">
              
              <a
                href="#"
                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                <RichText
                  value={attributes.contentUC}
                  default={" Learn more "}
                  onChange={(newtext) =>
                    setAttributes({ contentUC: newtext })
                  }
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <div class="bg-white">
        
        <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
          
          <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            
            <span class="block">{attributes.contentUA} </span>
            <span class="block">{attributes.contentt} </span>
          </h2>
          <div class="mt-8 flex justify-center">
            
            <div class="inline-flex rounded-md shadow">
              
              <a
                href={
                  attributes.contentUB.match('(.*?)href="(.*?)"(.*?)')
                    ? attributes.contentUB.match('(.*?)href="(.*?)"(.*?)')[2]
                    : attributes.contentUB
                }
                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              >
                {attributes.contentUB.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")
                  ? attributes.contentUB.match(
                      "(?<=<.+.>)(.*?)(?=<.*/.+.?>)"
                    )[0]
                  : attributes.contentUB}
              </a>
            </div>
            <div class="ml-3 inline-flex">
              
              <a
                href={
                  attributes.contentUC.match('(.*?)href="(.*?)"(.*?)')
                    ? attributes.contentUC.match('(.*?)href="(.*?)"(.*?)')[2]
                    : attributes.contentUC
                }
                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                {attributes.contentUC.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")
                  ? attributes.contentUC.match(
                      "(?<=<.+.>)(.*?)(?=<.*/.+.?>)"
                    )[0]
                  : attributes.contentUC}
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  },
});
