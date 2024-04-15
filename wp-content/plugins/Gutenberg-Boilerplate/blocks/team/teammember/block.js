const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InnerBlocks } = wp.blockEditor;

registerBlockType("gb/teammember", {
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
    contentUD: { type: "string", default: `Twitter` },
    contentUE: { type: "string", default: `LinkedIn` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <li>
        
        <div className="space-y-6">
          
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
          <div className="space-y-2">
            
            <div className="text-lg leading-6 font-medium space-y-1">
              
              <h3>
                
                <RichText
                  value={attributes.contentt}
                  default={"Whitney Francis"}
                  onChange={(newtext) => setAttributes({ contentt: newtext })}
                />
              </h3>
              <p className="text-indigo-600">
                
                <RichText
                  value={attributes.contentUC}
                  default={"Copywriter"}
                  onChange={(newtext) =>
                    setAttributes({ contentUC: newtext })
                  }
                />
              </p>
            </div>
            <ul role="list" className="flex justify-center space-x-5">
              
                
                <InnerBlocks  allowedBlocks={ ['core/social-links'] } template={ [['core/social-links']] } templateLock="all" />
            </ul>
          </div>
        </div>
      </li>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <div>
        
        <div class="space-y-6">
          
          <img
            src={attributes.imageUrl}
            class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
          />
          <div class="space-y-2">
            
            <div class="text-lg leading-6 font-medium space-y-1">
              
              <h3><RichText.Content value={attributes.contentt}/> </h3>
              <p class="text-indigo-600"><RichText.Content value={attributes.contentUC}/> </p>
            </div>
            <div>
                <InnerBlocks.Content />
            </div>
          </div>
        </div>
      </div>
    );
  },
});
