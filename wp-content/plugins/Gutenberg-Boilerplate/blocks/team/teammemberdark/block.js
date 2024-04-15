const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InnerBlocks } = wp.blockEditor;

registerBlockType("gb/teammemberdark", {
  title: __("Team member", "GB"),
  icon: "shield",
  category: "team",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default:
        "https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80",
    },
    contentt: { type: "string", default: `Whitney Francis` },
    contentUC: { type: "string", default: `Copywriter` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <div>
        <div className="py-10 px-6 bg-gray-800 text-center rounded-lg xl:px-10 xl:text-left">    
          <div className="space-y-6 xl:space-y-10">
            <MediaUpload
                onSelect={(media) => {
                  setAttributes({ imageUrl: media.url });
                }}
                type="image"
                render={({ open }) => (
                  <img
                    src={attributes.imageUrl}
                    onClick={open}
                    className="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                  />
                )}
              />
              <div className="space-y-2 xl:flex xl:items-center xl:justify-between">
                <div className="font-medium text-lg leading-6 space-y-1">
                    
                    <h3 className="text-white">
                      <RichText
                        value={attributes.contentt}
                        default={"Whitney Francis"}
                        onChange={(newtext) => setAttributes({ contentt: newtext })}
                      />
                    </h3>
                    <p className="text-indigo-400">
                      <RichText
                        value={attributes.contentUC}
                        default={"Copywriter"}
                        onChange={(newtext) =>
                          setAttributes({ contentUC: newtext })
                        }
                      />
                    </p>
                  </div>
                  <div>
                    <InnerBlocks  allowedBlocks={ ['core/social-links'] } template={ [['core/social-links']] } templateLock="all" />
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
      
        <div>
          <div class="py-10 px-6 bg-gray-800 text-center rounded-lg xl:px-10 xl:text-left">
            <div class="space-y-6">
              
              <img
                src={attributes.imageUrl}
                class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
              />
              <div className="space-y-2 xl:flex xl:items-center xl:justify-between">
                  
                  <div className="font-medium text-lg leading-6 space-y-1">
                  
                  <h3 class="text-white"><RichText.Content value={attributes.contentt}/> </h3>
                  <p class="text-indigo-400"><RichText.Content value={attributes.contentUC}/> </p>
                </div>
                <div>
                    <InnerBlocks.Content />
                </div>
              </div>
            </div>
          </div>    
        </div>
    );
  },
});
