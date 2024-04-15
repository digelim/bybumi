const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InnerBlocks } = wp.blockEditor;

registerBlockType("gb/teammembersmall", {
  title: __("Team member small", "GB"),
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
        <div className="space-y-4">
          <MediaUpload
            onSelect={(media) => {
              setAttributes({ imageUrl: media.url });
            }}
            type="image"
            render={({ open }) => (
              <img
                src={attributes.imageUrl}
                onClick={open}
                className="mx-auto h-20 w-20 rounded-full lg:w-24 lg:h-24"
              />
            )}
          />
          <div className="space-y-2">
            
            <div className="text-xs font-medium lg:text-sm">
              
              <h3>
                <RichText
                  value={attributes.contentUB}
                  default={"Michael Foster"}
                  onChange={(newtext) =>
                    setAttributes({ contentUB: newtext })
                  }
                />
              </h3>
              <p className="text-indigo-600">
                <RichText
                  value={attributes.contentUC}
                  default={"Co-Founder / CTO"}
                  onChange={(newtext) =>
                    setAttributes({ contentUC: newtext })
                  }
                />
              </p>
            </div>
          </div>
        </div>
      </div>
    )},
    save: function (props) {
      const { attributes } = props;
  
      return (          
      <div>
        <div class="space-y-4">
            <img
              src={attributes.imageUrl}
              class="mx-auto h-20 w-20 rounded-full lg:w-24 lg:h-24"
            />
          <div class="space-y-2">
            
            <div class="text-xs font-medium lg:text-sm">
              
              <h3>
                { attributes.contentUB }
              </h3>
              <p className="text-indigo-600">
               <RichText.Content value={attributes.contentUC}/>
              </p>
            </div>
          </div>
        </div>
        </div>
      );
    },
  });
  
