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


registerBlockType("gb/offwhitegrid", {
  title: __("Off White Grid", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "logo-clouds",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"
    },
    imageUrlA: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"
    },
    imageUrlB: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
    },
    imageUrlC: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/laravel-logo-gray-400.svg"
    },
    imageUrlD: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
    },
    imageUrlE: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/statamic-logo-gray-400.svg"
    },
    imageUrlF: {
      attribute: "src",
      selector: "img",
      default: ""
    },
    contentt: {
      type: "string",
      default: "Trusted by over 5 very average small businesses"
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      { className: "bg-white" },
      wp.element.createElement(
        "div",
        { className: "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8" },
        wp.element.createElement(
          "p",
          { className: "text-center text-base font-semibold uppercase text-gray-600 tracking-wider" },
          wp.element.createElement(RichText, {
            value: attributes.contentt,
            "default": "Trusted by over 5 very average small businesses",
            onChange: function onChange(newtext) {
              return setAttributes({ contentt: newtext });
            }
          })
        ),
        wp.element.createElement(
          "div",
          { className: "mt-6 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-8" },
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrl: media.url });
              },
              type: "image",
              render: function render(_ref) {
                var open = _ref.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrl,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrlB: media.url });
              },
              type: "image",
              render: function render(_ref2) {
                var open = _ref2.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrlB,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrlC: media.url });
              },
              type: "image",
              render: function render(_ref3) {
                var open = _ref3.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrlC,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrlD: media.url });
              },
              type: "image",
              render: function render(_ref4) {
                var open = _ref4.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrlD,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrlE: media.url });
              },
              type: "image",
              render: function render(_ref5) {
                var open = _ref5.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrlE,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrlF: media.url });
              },
              type: "image",
              render: function render(_ref6) {
                var open = _ref6.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrlF,
                  onClick: open,
                  className: "max-h-12"
                });
              }
            })
          )
        )
      )
    );
  },
  save: function save(props) {
    var attributes = props.attributes;


    return wp.element.createElement(
      "div",
      { "class": "bg-white" },
      wp.element.createElement(
        "div",
        { "class": "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8" },
        wp.element.createElement(
          "p",
          { "class": "text-center text-base font-semibold uppercase text-gray-600 tracking-wider" },
          wp.element.createElement(RichText.Content, { value: attributes.contentt })
        ),
        wp.element.createElement(
          "div",
          { "class": "mt-6 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-8" },
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/transistor-logo-gray-400.svg",
              alt: "Workcation"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/mirage-logo-gray-400.svg",
              alt: "Mirage"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/tuple-logo-gray-400.svg",
              alt: "Tuple"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/laravel-logo-gray-400.svg",
              alt: "Laravel"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/statickit-logo-gray-400.svg",
              alt: "StaticKit"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center py-8 px-8 bg-gray-50" },
            wp.element.createElement("img", {
              "class": "max-h-12",
              src: "https://tailwindui.com/img/logos/statamic-logo-gray-400.svg",
              alt: "Statamic"
            })
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);