/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$blockEditor = wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    MediaUpload = _wp$blockEditor.MediaUpload;


registerBlockType("gb/simplethreecolumnfeature", {
  title: __("Simple Three Column", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "feature",
  attributes: {
    imageUrl: {
      attribute: 'src',
      selector: 'img',
      default: "data:image/svg+xml,%3Csvg className='h-6 w-6' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white' aria-hidden='true' %3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9' /%3E%3C/svg%3E"
    },
    imageUrlA: {
      attribute: 'src',
      selector: 'img',
      default: "data:image/svg+xml,%3Csvg classname='h-6 w-6' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white' aria-hidden='true'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3'%3E%3C/path%3E%3C/svg%3E"
    },
    imageUrlB: {
      attribute: 'src',
      selector: 'img',
      default: "data:image/svg+xml,%3Csvg class='h-6 w-6' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white' aria-hidden='true' %3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 10V3L4 14h7v7l9-11h-7z' /%3E%3C/svg%3E"
    },
    contentUB: { type: "string", default: "A better way to send money." },
    contentUA: { type: "string", default: "Competitive exchange rates" },
    contentt: {
      type: "string",
      default: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione."
    },
    contentUC: { type: "string", default: "No hidden fees" },
    contentUD: {
      type: "string",
      default: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione."
    },
    contentUE: { type: "string", default: "Transfers are instant" },
    contentUF: {
      type: "string",
      default: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione."
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      { className: "py-12 bg-white" },
      wp.element.createElement(
        "div",
        { className: "max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8" },
        wp.element.createElement(
          "h2",
          { className: "sr-only" },
          wp.element.createElement(RichText, {
            value: attributes.contentUB,
            "default": "A better way to send money.",
            onChange: function onChange(newtext) {
              return setAttributes({ contentUB: newtext });
            }
          })
        ),
        wp.element.createElement(
          "dl",
          { className: "space-y-10 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-8" },
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { className: "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement(MediaUpload, { onSelect: function onSelect(media) {
                    setAttributes({ imageUrl: media.url });
                  }, type: "image", render: function render(_ref) {
                    var open = _ref.open;
                    return wp.element.createElement("img", { src: attributes.imageUrl, onClick: open, className: "h-6 w-6" });
                  } })
              ),
              wp.element.createElement(
                "p",
                { className: "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText, {
                  value: attributes.contentUA,
                  "default": "Competitive exchange rates",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUA: newtext });
                  }
                })
              )
            ),
            wp.element.createElement(
              "dd",
              { className: "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText, {
                value: attributes.contentt,
                "default": "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentt: newtext });
                }
              })
            )
          ),
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { className: "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement(MediaUpload, { onSelect: function onSelect(media) {
                    setAttributes({ imageUrlA: media.url });
                  }, type: "image", render: function render(_ref2) {
                    var open = _ref2.open;
                    return wp.element.createElement("img", { src: attributes.imageUrlA, onClick: open, className: "h-6 w-6" });
                  } })
              ),
              wp.element.createElement(
                "p",
                { className: "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText, {
                  value: attributes.contentUC,
                  "default": "No hidden fees",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUC: newtext });
                  }
                })
              )
            ),
            wp.element.createElement(
              "dd",
              { className: "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText, {
                value: attributes.contentUD,
                "default": "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentUD: newtext });
                }
              })
            )
          ),
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { className: "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement(MediaUpload, { onSelect: function onSelect(media) {
                    setAttributes({ imageUrlB: media.url });
                  }, type: "image", render: function render(_ref3) {
                    var open = _ref3.open;
                    return wp.element.createElement("img", { src: attributes.imageUrlB, onClick: open, className: "h-6 w-6" });
                  } })
              ),
              wp.element.createElement(
                "p",
                { className: "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText, {
                  value: attributes.contentUE,
                  "default": "Transfers are instant",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUE: newtext });
                  }
                })
              )
            ),
            wp.element.createElement(
              "dd",
              { className: "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText, {
                value: attributes.contentUF,
                "default": "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentUF: newtext });
                }
              })
            )
          )
        )
      )
    );
  },
  save: function save(props) {
    var attributes = props.attributes;


    return wp.element.createElement(
      "div",
      { "class": "py-12 bg-white" },
      wp.element.createElement(
        "div",
        { "class": "max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8" },
        wp.element.createElement(
          "h2",
          { "class": "sr-only" },
          attributes.contentUB,
          " "
        ),
        wp.element.createElement(
          "dl",
          { "class": "space-y-10 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-8" },
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { "class": "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement("img", { src: attributes.imageUrl, "class": "h-6 w-6" })
              ),
              wp.element.createElement(
                "p",
                { "class": "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText.Content, { value: attributes.contentUA })
              )
            ),
            wp.element.createElement(
              "dd",
              { "class": "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText.Content, { value: attributes.contentt })
            )
          ),
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { "class": "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement("img", { src: attributes.imageUrlA, "class": "h-6 w-6" })
              ),
              wp.element.createElement(
                "p",
                { "class": "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText.Content, { value: attributes.contentUC })
              )
            ),
            wp.element.createElement(
              "dd",
              { "class": "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText.Content, { value: attributes.contentUD })
            )
          ),
          wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
              "dt",
              null,
              wp.element.createElement(
                "div",
                { "class": "flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white" },
                wp.element.createElement("img", { src: attributes.imageUrlB, "class": "h-6 w-6" })
              ),
              wp.element.createElement(
                "p",
                { "class": "mt-5 text-lg leading-6 font-medium text-gray-900" },
                wp.element.createElement(RichText.Content, { value: attributes.contentUE })
              )
            ),
            wp.element.createElement(
              "dd",
              { "class": "mt-2 text-base text-gray-500" },
              wp.element.createElement(RichText.Content, { value: attributes.contentUF })
            )
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);