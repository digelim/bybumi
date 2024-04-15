const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InnerBlocks } = wp.blockEditor;

registerBlockType("gb/teammembergrid", {
  title: __("Team member grid", "GB"),
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
    contentUD: { type: "string", default: `Ultricies massa malesuada viverra cras lobortis. Tempor orci hac ligula dapibus mauris sit ut eu. Eget turpis urna maecenas cras. Nisl dictum.` },
  },
  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <li>
        <div className="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8">
          <div className="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
            <MediaUpload
              onSelect={(media) => {
                setAttributes({ imageUrl: media.url });
              }}
              type="image"
              render={({ open }) => (
                <img
                  src={attributes.imageUrl}
                  onClick={open}
                  className="object-cover shadow-lg rounded-lg"
                />
              )}
            />
            </div>
            <div className="sm:col-span-2">
              <div className="space-y-4"> 
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
                <div className="text-lg">
                  <p className="text-gray-500">
                    <RichText
                      value={attributes.contentUD}
                      default={
                        "Ultricies massa malesuada viverra cras lobortis. Tempor orci hac ligula dapibus mauris sit ut eu. Eget turpis urna maecenas cras. Nisl dictum."
                      }
                      onChange={(newtext) =>
                        setAttributes({ contentUD: newtext })
                      }
                    />
                  </p>
                </div>
              </div>
            </div>
          </div> 
      </li>
    );
  },
  save: function (props) {
    const { attributes } = props;

    return (
      <li> 
        <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8">
          <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
            <img
              src={attributes.imageUrl}
              class="object-cover shadow-lg rounded-lg"
            />
          </div>
          <div class="sm:col-span-2">
            <div class="space-y-4">
              
              <div class="text-lg leading-6 font-medium space-y-1">  
                <h3><RichText.Content value={attributes.contentt}/> </h3>
                <p classname="text-indigo-600"><RichText.Content value={attributes.contentUC}/></p>
              </div> 
              <div classname="text-lg">
                <p classname="text-gray-500"><RichText.Content value={attributes.contentUD}/></p>
              </div>
            </div>
          </div>
        </div>
      </li>

    );
  },
});
