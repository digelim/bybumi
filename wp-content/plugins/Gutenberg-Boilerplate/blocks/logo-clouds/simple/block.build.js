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


registerBlockType("gb/simple", {
  title: __("Simple", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "logo-clouds",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
    },
    imageUrlA: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"
    },
    imageUrlB: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
    },
    imageUrlC: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"
    },
    imageUrlD: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"
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
        { className: "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "div",
          { className: "grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5" },
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
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
                  className: "h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
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
                  className: "h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
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
                  className: "h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-1 flex justify-center md:col-span-3 lg:col-span-1" },
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
                  className: "h-12"
                });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "col-span-2 flex justify-center md:col-span-3 lg:col-span-1" },
            wp.element.createElement(MediaUpload, {
              onSelect: function onSelect(media) {
                setAttributes({ imageUrl: media.url });
              },
              type: "image",
              render: function render(_ref5) {
                var open = _ref5.open;
                return wp.element.createElement("img", {
                  src: attributes.imageUrl,
                  onClick: open,
                  className: "h-12"
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
        { "class": "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "div",
          { "class": "grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5" },
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
            wp.element.createElement("img", {
              "class": "h-12",
              src: plugin_url.url + "img/logos/tuple-logo-gray-400.svg",
              alt: "Tuple"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
            wp.element.createElement("img", {
              "class": "h-12",
              src: plugin_url.url + "img/logos/mirage-logo-gray-400.svg",
              alt: "Mirage"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center md:col-span-2 lg:col-span-1" },
            wp.element.createElement("img", {
              "class": "h-12",
              src: plugin_url.url + "img/logos/statickit-logo-gray-400.svg",
              alt: "StaticKit"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-1 flex justify-center md:col-span-3 lg:col-span-1" },
            wp.element.createElement("img", {
              "class": "h-12",
              src: plugin_url.url + "img/logos/transistor-logo-gray-400.svg",
              alt: "Transistor"
            })
          ),
          wp.element.createElement(
            "div",
            { "class": "col-span-2 flex justify-center md:col-span-3 lg:col-span-1" },
            wp.element.createElement("img", {
              "class": "h-12",
              src: plugin_url.url + "img/logos/workcation-logo-gray-400.svg",
              alt: "Workcation"
            })
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);