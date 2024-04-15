const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText,InnerBlocks } = wp.blockEditor;

const year = new Date().getFullYear();

registerBlockType("gb/sociallinksonly", {
  title: __("Social Links Only", "GB"),
  icon: (
    <img src="data:image/png;base64,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" />
  ),
  category: "footer",
  attributes: {
    contentUA: { type: "string", default: `Facebook` },
    contentt: { type: "string", default: `Instagram` },
    contentUB: { type: "string", default: `Twitter` },
    contentUC: { type: "string", default: `GitHub` },
    contentUD: { type: "string", default: `Dribbble` },
    contentUE: {
      type: "string",
      default: `&copy; ${year} Workflow, Inc. All rights reserved.`,
    },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <footer className="bg-white">
        
        <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
          
          <div className="flex justify-center space-x-6 md:order-2">
            <InnerBlocks
              allowedBlocks={["core/social-links"]}
              template={[["core/social-links"]]} templateLock="all"
            />
          </div>
          <div className="mt-8 md:mt-0 md:order-1">
            
            <p className="text-center text-base text-gray-400">
              <RichText
                value={attributes.contentUE}
                default={"&copy; 2020 Workflow, Inc. All rights reserved."}
                onChange={(newtext) => setAttributes({ contentUE: newtext })}
              />
            </p>
          </div>
        </div>
      </footer>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <footer class="bg-white">
        
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
          
          <div class="flex justify-center space-x-6 md:order-2">
            
            <InnerBlocks.Content/>
          </div>
          <div class="mt-8 md:mt-0 md:order-1">
            
            <p class="text-center text-base text-gray-400">
             <RichText.Content value={attributes.contentUE}/>
            </p>
          </div>
        </div>
      </footer>
    );
  },
});
