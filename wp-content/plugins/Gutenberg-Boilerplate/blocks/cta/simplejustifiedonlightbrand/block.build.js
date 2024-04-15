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
var RichText = wp.blockEditor.RichText;


registerBlockType("gb/simplejustifiedonlightbrand", {
  title: __("Simple Justified On Light Brand", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,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" }),
  category: "cta",
  attributes: {
    contentUA: { type: "string", default: "Ready to dive in?" },
    contentt: { type: "string", default: "Start your free trial today." },
    contentUB: { type: "string", default: " Get started " }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      { className: "bg-indigo-50" },
      wp.element.createElement(
        "div",
        { className: "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between" },
        wp.element.createElement(
          "h2",
          { className: "text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl" },
          wp.element.createElement(
            "span",
            { className: "block" },
            wp.element.createElement(RichText, {
              value: attributes.contentUA,
              "default": "Ready to dive in?",
              onChange: function onChange(newtext) {
                return setAttributes({ contentUA: newtext });
              }
            })
          ),
          wp.element.createElement(
            "span",
            { className: "block text-indigo-600" },
            wp.element.createElement(RichText, {
              value: attributes.contentt,
              "default": "Start your free trial today.",
              onChange: function onChange(newtext) {
                return setAttributes({ contentt: newtext });
              }
            })
          )
        ),
        wp.element.createElement(
          "div",
          { className: "mt-8 flex lg:mt-0 lg:flex-shrink-0" },
          wp.element.createElement(
            "div",
            { className: "inline-flex rounded-md shadow" },
            wp.element.createElement(
              "a",
              {
                href: "#",
                className: "inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              },
              wp.element.createElement(RichText, {
                value: attributes.contentUB,
                "default": " Get started ",
                onChange: function onChange(newtext) {
                  return setAttributes({ contentUB: newtext });
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
      { "class": "bg-indigo-50" },
      wp.element.createElement(
        "div",
        { "class": "max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between" },
        wp.element.createElement(
          "h2",
          { "class": "text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl" },
          wp.element.createElement(
            "span",
            { "class": "block" },
            attributes.contentUA,
            " "
          ),
          wp.element.createElement(
            "span",
            { "class": "block text-indigo-600" },
            attributes.contentt,
            " "
          )
        ),
        wp.element.createElement(
          "div",
          { "class": "mt-8 flex lg:mt-0 lg:flex-shrink-0" },
          wp.element.createElement(
            "div",
            { "class": "inline-flex rounded-md shadow" },
            wp.element.createElement(
              "a",
              {
                href: attributes.contentUB.match('(.*?)href="(.*?)"(.*?)') ? attributes.contentUB.match('(.*?)href="(.*?)"(.*?)')[2] : attributes.contentUB,
                "class": "inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              },
              attributes.contentUB.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)") ? attributes.contentUB.match("(?<=<.+.>)(.*?)(?=<.*/.+.?>)")[0] : attributes.contentUB
            )
          )
        )
      )
    );
  }
});

/***/ })
/******/ ]);