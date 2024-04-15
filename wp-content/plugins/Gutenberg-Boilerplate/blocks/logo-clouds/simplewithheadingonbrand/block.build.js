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


registerBlockType("gb/simplewithheadingonbrand", {
  title: __("Simple With Heading On Brand", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "logo-clouds",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/tuple-logo-indigo-300.svg"
    },
    imageUrlA: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/mirage-logo-indigo-300.svg"
    },
    imageUrlB: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/statickit-logo-indigo-300.svg"
    },
    imageUrlC: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/transistor-logo-indigo-300.svg"
    },
    imageUrlD: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/workcation-logo-indigo-300.svg"
    },
    contentt: {
      type: "string",
      default: "The world's most innovative companies use Workflow"
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      { className: "bg-indigo-700" },
      wp.element.createElement(
        "div",
        { className: "max-w-7xl mx-auto py-16 px-4 sm:py-20 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "h2",
          { className: "text-3xl font-extrabold text-white" },
          wp.element.createElement(RichText, {
            value: attributes.contentt,
            "default": "The world's most innovative companies use Workflow",
            onChange: function onChange(newtext) {
              return setAttributes({ contentt: newtext });
            }
          })
        ),
        wp.element.createElement(
          "div",
          { className: "flow-root mt-8 lg:mt-10" },
          wp.element.createElement(
            "div",
            { className: "-mt-4 -ml-8 flex flex-wrap justify-between lg:-ml-4" },
            wp.element.createElement(
              "div",
              { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
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
              { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement(MediaUpload, {
                onSelect: function onSelect(media) {
                  setAttributes({ imageUrlA: media.url });
                },
                type: "image",
                render: function render(_ref2) {
                  var open = _ref2.open;
                  return wp.element.createElement("img", {
                    src: attributes.imageUrlA,
                    onClick: open,
                    className: "h-12"
                  });
                }
              })
            ),
            wp.element.createElement(
              "div",
              { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement(MediaUpload, {
                onSelect: function onSelect(media) {
                  setAttributes({ imageUrlB: media.url });
                },
                type: "image",
                render: function render(_ref3) {
                  var open = _ref3.open;
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
              { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement(MediaUpload, {
                onSelect: function onSelect(media) {
                  setAttributes({ imageUrlC: media.url });
                },
                type: "image",
                render: function render(_ref4) {
                  var open = _ref4.open;
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
              { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement(MediaUpload, {
                onSelect: function onSelect(media) {
                  setAttributes({ imageUrlD: media.url });
                },
                type: "image",
                render: function render(_ref5) {
                  var open = _ref5.open;
                  return wp.element.createElement("img", {
                    src: attributes.imageUrlD,
                    onClick: open,
                    className: "h-12"
                  });
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
      { "class": "bg-indigo-700" },
      wp.element.createElement(
        "div",
        { "class": "max-w-7xl mx-auto py-16 px-4 sm:py-20 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "h2",
          { "class": "text-3xl font-extrabold text-white" },
          wp.element.createElement(RichText.Content, { value: attributes.contentt })
        ),
        wp.element.createElement(
          "div",
          { "class": "flow-root mt-8 lg:mt-10" },
          wp.element.createElement(
            "div",
            { "class": "-mt-4 -ml-8 flex flex-wrap justify-between lg:-ml-4" },
            wp.element.createElement(
              "div",
              { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement("img", {
                "class": "h-12",
                src: "https://tailwindui.com/img/logos/tuple-logo-indigo-300.svg",
                alt: "Tuple"
              })
            ),
            wp.element.createElement(
              "div",
              { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement("img", {
                "class": "h-12",
                src: "https://tailwindui.com/img/logos/mirage-logo-indigo-300.svg",
                alt: "Mirage"
              })
            ),
            wp.element.createElement(
              "div",
              { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement("img", {
                "class": "h-12",
                src: "https://tailwindui.com/img/logos/statickit-logo-indigo-300.svg",
                alt: "StaticKit"
              })
            ),
            wp.element.createElement(
              "div",
              { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement("img", {
                "class": "h-12",
                src: "https://tailwindui.com/img/logos/transistor-logo-indigo-300.svg",
                alt: "Transistor"
              })
            ),
            wp.element.createElement(
              "div",
              { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 lg:flex-grow-0 lg:ml-4" },
              wp.element.createElement("img", {
                "class": "h-12",
                src: "https://tailwindui.com/img/logos/workcation-logo-indigo-300.svg",
                alt: "Workcation"
              })
            )
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);