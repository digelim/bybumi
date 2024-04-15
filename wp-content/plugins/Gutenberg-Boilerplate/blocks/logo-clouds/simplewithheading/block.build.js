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


registerBlockType("gb/simplewithheading", {
  title: __("Simple With Heading", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "logo-clouds",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/workcation-logo-indigo-900.svg"
    },
    imageUrlA: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/tuple-logo-indigo-900.svg"
    },
    imageUrlB: {
      attribute: "src",
      selector: "img",
      default: "https://tailwindui.com/img/logos/level-logo-indigo-900.svg"
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
      { className: "bg-indigo-200 bg-opacity-25" },
      wp.element.createElement(
        "div",
        { className: "max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "div",
          { className: "lg:grid lg:grid-cols-2 lg:gap-8" },
          wp.element.createElement(
            "h2",
            { className: "max-w-md mx-auto text-3xl font-extrabold text-indigo-900 text-center lg:max-w-xl lg:text-left" },
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
            { className: "flow-root self-center mt-8 lg:mt-0" },
            wp.element.createElement(
              "div",
              { className: "-mt-4 -ml-8 flex flex-wrap justify-between lg:-ml-4" },
              wp.element.createElement(
                "div",
                { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
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
                { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
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
                { className: "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
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
              )
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
      { "class": "bg-indigo-200 bg-opacity-25" },
      wp.element.createElement(
        "div",
        { "class": "max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8" },
        wp.element.createElement(
          "div",
          { "class": "lg:grid lg:grid-cols-2 lg:gap-8" },
          wp.element.createElement(
            "h2",
            { "class": "max-w-md mx-auto text-3xl font-extrabold text-indigo-900 text-center lg:max-w-xl lg:text-left" },
            wp.element.createElement(RichText.Content, { value: attributes.contentt }),
            " default=",
            "The world's most innovative companies use Workflow",
            " onChange=",
            function (newtext) {
              return setAttributes({ contentt: newtext });
            }
          ),
          wp.element.createElement(
            "div",
            { "class": "flow-root self-center mt-8 lg:mt-0" },
            wp.element.createElement(
              "div",
              { "class": "-mt-4 -ml-8 flex flex-wrap justify-between lg:-ml-4" },
              wp.element.createElement(
                "div",
                { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
                wp.element.createElement("img", {
                  "class": "h-12",
                  src: "https://tailwindui.com/img/logos/workcation-logo-indigo-900.svg",
                  alt: "Workcation"
                })
              ),
              wp.element.createElement(
                "div",
                { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
                wp.element.createElement("img", {
                  "class": "h-12",
                  src: "https://tailwindui.com/img/logos/tuple-logo-indigo-900.svg",
                  alt: "Tuple"
                })
              ),
              wp.element.createElement(
                "div",
                { "class": "mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4" },
                wp.element.createElement("img", {
                  "class": "h-12",
                  src: "https://tailwindui.com/img/logos/level-logo-indigo-900.svg",
                  alt: "Level"
                })
              )
            )
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);