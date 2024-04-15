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
    MediaUpload = _wp$blockEditor.MediaUpload,
    InnerBlocks = _wp$blockEditor.InnerBlocks;


registerBlockType("gb/teammembersmall", {
  title: __("Team member small", "GB"),
  icon: "shield",
  category: "team",
  attributes: {
    imageUrl: {
      attribute: "src",
      selector: "img",
      default: "https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
    },
    contentt: { type: "string", default: "Whitney Francis" },
    contentUC: { type: "string", default: "Copywriter" }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      null,
      wp.element.createElement(
        "div",
        { className: "space-y-4" },
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
              className: "mx-auto h-20 w-20 rounded-full lg:w-24 lg:h-24"
            });
          }
        }),
        wp.element.createElement(
          "div",
          { className: "space-y-2" },
          wp.element.createElement(
            "div",
            { className: "text-xs font-medium lg:text-sm" },
            wp.element.createElement(
              "h3",
              null,
              wp.element.createElement(RichText, {
                value: attributes.contentUB,
                "default": "Michael Foster",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentUB: newtext });
                }
              })
            ),
            wp.element.createElement(
              "p",
              { className: "text-indigo-600" },
              wp.element.createElement(RichText, {
                value: attributes.contentUC,
                "default": "Co-Founder / CTO",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentUC: newtext });
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
      null,
      wp.element.createElement(
        "div",
        { "class": "space-y-4" },
        wp.element.createElement("img", {
          src: attributes.imageUrl,
          "class": "mx-auto h-20 w-20 rounded-full lg:w-24 lg:h-24"
        }),
        wp.element.createElement(
          "div",
          { "class": "space-y-2" },
          wp.element.createElement(
            "div",
            { "class": "text-xs font-medium lg:text-sm" },
            wp.element.createElement(
              "h3",
              null,
              attributes.contentUB
            ),
            wp.element.createElement(
              "p",
              { className: "text-indigo-600" },
              wp.element.createElement(RichText.Content, { value: attributes.contentUC })
            )
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);