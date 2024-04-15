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


registerBlockType("gb/simplewithselectmenu", {
  title: __("Simple With Select Menu", "GB"),
  icon: wp.element.createElement("img", { src: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAACgAAAAKQCAMAAABkA9POAAACu1BMVEX////+/v7d3+HV19r5+frn6evOz9Py8vTp6ux3e4RFSlYbITARGCcVHCs7QU1manTP0dSPk5pPVF8lKzkvNUJZXmmtsLWipasgJzUTGil8gIj19vbHyMw2PEhXW2bj4+X39/iBhIy1t7x0eIFARlIeJDLf4OPl5ui+wMTFxsrb3N7m5+nz9PWytbvh4uX7+/ugo6kjKjdITVlvc3yUl56Ym6Hc3d9iZnCnqa/u7u/9/f5bYGqdn6bY2d0sMj8SGShscHoWHSyHi5L4+Pmvsrfv7/AzOUbLzdKkp60xN0QYHy2eoaj7/PzKzM+3ub1NUl7s7O7q6+1gZG5qbniMj5ZJT1r09fU5Pkv6+vuxs7hCR1OSlZzIys3S09d5fYW5u7/a297Bw8e7vcLU1djj5Ofw8fKWmaC9v8OanaOEiI8pLz09Q09SV2NLUVx+goqLjpYuNUJdYmxxdX7Z2t1UWWSpq7GrrbNQVWDDxciNkJfk5ejX2dvx8vPv7/EnLTvf4eTJy9G2ucCusrrExszCxcuDiZVrcoCeo6yJj5ptdIKwtLt6gI18go+TmKKcoapxeIX8/P2GjJjW2Ny6vcR0e4izt76anqh2fYpwdoR/hZK7v8W+wcjp6u24vMOXnKbb3eHZ2t63usGkqLGlqrKmq7Pt7vDEx83d3+K9wMfV19vT1dro6ez09PbP0dZzeYfHys+EipZsc4GboKrKzNKWm6V4fotwd4Whpq/+/v99g5CqrrZ4f4yAhpKCiJTFyM7MztOprbXBxMrS1Niytr17gY6MkZzN0NWUmaRvdYS/wsigpa6Fi5eHjZissLjm5+rQ09eip7CPlJ+ipq/h4+aGjJeOk560uL9+hJGRlqH29/iYnafT1dnX2+DT193R1dvj5urAw8mnq7SQlaCco6+wtL3a3ODBxc2Bh5Pz9PaWHPF1AABPuklEQVR4AezcA5YsaRSF0VvWLdtW89m2zfkPpI3MjPYf2Yq9p3AWvqUTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEBPb19/dNXA4FD8OwAAMDwyOpY5PjE5Fd3RPz0zm5lz8wvxjwMAoGdxKX+wvLIaXbC2nj/a2AwAAP5ZWzPZYq43aredLcZ2AgCAf9Ruttnrj5otZJv9gwAAIOLw6HcdT33y6WdRt8+zw0rU64v9bDf6ZcMHOqpYDQCggU7kH3Py1OkzxzUWVP9SdpqKWm1kp7MNH2g5O50LAEAA/ral8xcuRj0Gs8t9dmk/O11uyEACEAAo6Iuqsd16ouFKVkxGna5mxbXGDCQAAYCCvqi6Pn81yt3IivWo04WsGmjOQAIQACjoi6qbt25Hqd2smIg63cmqu00aSAACAAV9UXXvfhR6kBWno04HWfGw4QMJQACgoC/y0UKU6cuKx1Grk9npfNMGEoAAQEFfVN2KIk/mssPN3qjVZHa60PCBBCAAUNYXuR1Fni53+aXv7rVsd7npAwlAAKCwL/JKFJnONhtRt7X24Ll2sekDCUAAoLQvlp9FiZ7dbPH8RdRucSx/NjfY+IEEIABQ2hd58mUUWVvPHywtRjdsbuQPlldWDSQAAYDivshXUab/yuu9R8vrr94MR5fs7L5dymsb21MGqiMAAQABmDtR7MlWdNk7A/12AAIAAnD9/c/WT+ZvuXcp/uUM9PsBCADoi3fR6sPh1MKrsfwVH+Nfz0C/H4AAgL6oeLfwNr9m504bmsi2Lo7viI1CVlA6oAQEZBaxZUZBmpAoPIxyEbkgkxJHcEKcJ776HVuR2uekiiRVFM9dv0+Qs/abP6PRilD4D8QAdEdERMS+0CKrKZisSfjxQAxAIiIi8tIXyvo4DDYk3HignAOQiIiI2BfS2gKtQij8B2IAEhERUW59IfdgUCQedQ7cPne//WpE8nGx40HxZmZ9fkj8dvLqentmfVAOb6ij6EJmtrUmZAfKIQD1SwKfVjnZ8XAzs1b06PGQEBERUQB9IU3QnsgPq05P5YeTzyprY/iPaIn8x6oyJlnN39qqrMBfEtvNdb199ZLFrVWnh/JT26rTsux7PDH6/MfHrX3R2zjjPU9uV7+M4r9alqqLZd/QqlNfwAfyHID6Ja+KZV/9qlOX+D/t0OzrupWKFvy0cyPdWC8+IyIiYgC2Qhu190Wv/Fdn1wj2VeZQI9LW/zIJrXTVXgC/w+mXTLmQ5dWbb1I4aDvdJl7M7lbhoJ2GQfnLMpxiR30gDHh/SUXD2M+B4LQjPk9b33WnCiYVW2/FT0RERAxAWYSy4hqAtyaB/AJw9h2sSvvmCxqA6y9gkLixJm6KX8CgeyJiD8DgD+Rp8rPGvePvXQLQt2nvlSGL5v6L4h8iIiIG4Hko0YhLAA4D+QXg2gtkVTVRwAB8loRZ4olkNXgNFi/rvQVg8AfCwOFe8nubNQB9nLa9FC4qGsU3REREDMAOaPPZA/BDMr8APDUKVx9bCxWADbA7c1HsPm3DauSyewAGfyDb5O0jsKq4ag9An6YtqoMHH98KERER+RSAQwkoJ7IG4P0E8grACxXwIPpkqBAB2LmAbJofic3dJLKIF5kDMPgDuU9engBcWtYcgP5Mu5qEJ9HbQkRERP4EoIxAOZstAIunkFcAfk7Cm9KO/AOwpg7Zxb+IWQOyi7eZAzD4A7lNnkZ2I38zB6BP036GV4kuISIiIn8CsBTKp2wB+A75BGBkA549v5J3ADbBze8Rb/2nLM64B2DwB9KTp+GmLmIOQF+mTeMQ0kJERES+BOALKJksAfgV+QTgzAIO4UVnngH4NQFX/WLwDO623AMw+AOpyafhrs8cgH5M24BD+SBERETkRwCWQVnLEoCjeQVgLw5lIc8AfAF3U29FOZuCu8Rl9wAM+kBq8odTcBftMAagD9P243BaTggRERH50BdVUIrsATifyicAh3FI6bwC8D68WOkUh2+T8OKGewAGfCA1+ZVaeDFqCkAfpn0UxSE1nxQiIiIqeF/UQKu39sXoFvIIwPYYDut9HgH4vRaenBeHXXijx4gd7YHU5BvwJLlgCEAfpn2DQ+sTIiIiKnhfnIV2RfeFkkMAfo/j0OLfcg/AbngzJwcVJZCr2JEeSE0+EEOudqTw015Nwmhv5c3oi8kYTEY6hYiIiArdF9VQRsSfAGyCTWokAYuG3APQq2SHHPAOOYsd6YHU5DfgQwDmPm0DDJaePZb/GBpoSgXxdyBEREQMwJk9KHX+BOB6Aibx15nWGVkuupUeh0GqoxABODW+MtkCmyfyq02YJV5sPHu63ri62wyr2JEfaMBDuCVelPznJb3NuQRg7tPuQIlvyi/qR6E0CxEVGBExADPQGrwEYGLlTnX/8Ofq0Xc7HgOwBwbx1f3PdnMrBu1uvgGYqLw9L/924lkpjFbkV5UwunN5f7QVWMSO8kBq8jswuvNAfsg02wOw4NO2QRm5LAd9hlIvRFRQRMQArFmCdss9ACvutslPY+teauQSDBZPya+KVqBURPILwIUO2de4A5NW2deWgEHZWfnVHy0wigV/IPvk8zEYlBXLr+612AKw4NPeglOyVZw24HROiKigiIgB2Ast9dgtAKe6IqK5BGAltEXnB/u2A+VTPgGY6pIDTq/AYFr2pWFQOy8HXYjCJBb8geyTl8Ng3PmS9ilLABZ82s9wWhElUgqHEiGiQiIiBuAHGLwQlwBcKhLNrUZOJKEsXhGntQSctvIIwES7OJzahrYl+3ag7XwRp80UDGLBH8g++Ti0kXpxyqTMAVjwaavh1ODlyc1CRIVDRAzAmXQCBtMuAdhcIzkE4AaUqTbR0joT8wjAtCjXofXKT2+hpS6LNgGDWPAHsk7eCi31p2jT5gAs+LSjcLor2sk4gOhebem7a7sN5cPnMsVCRAVDRAzARz0wiQ5mD8DuesklALehbBmjZ1JFy82cA7B0RpTICpQ6+WkYWokYDC1BiwV/IOvk56E1GSevNQZgwafVAVgpBq0D88tCRD4gIgZg5/0zURhtZE06JC9JLgH4EEr8m5hUw2k95wDMiMEalOasfzk79ZuYNEKLBX8g6+RnoKS+iMk5YwAWfNoGOLW0ChH5hYgYgK2n93U8fHq9vLcbmm6EBJQ6ySkAy6H0i9EnON3PNQDjM2KyAqdt+SHSDaVazFagxII/kHXybShNYhQpMwVgoaeVVSjPLwoRFRgRMQBz0Js96XA/twB8CeW0GHVWwWE61wAsEaMzcEpE5C+PoH0RswkoseAPZJu8A1qrmE2bArDQ08oHaEuX5KgRERExAPcGs/fFzlBOATiTglOZWGy9dLieawBmxCgN5bv85ROUcbGohxIL/kC2yduhVIjFCVMAFnpa+QKTulvf5EgRERExABtdkq5EcgrAy1BeiWe5BmCRGL2HMpZlvF2xmTyCAGz0OvkElFGxGTEEYKGnFVmCUWxuda1GjgoRERED8Ixb0vXlFoCNUC75H4CDYjSbpVIaoNwSm97gA/CM58m3oLwXmwVDABZ6WpFqWCWWFvpZgUeCiIgYgD01bn1xL7cALIdT4qLvATglZvNZKuUNlHmx+aADMOgD2Se/BqVNbK6bA7Cg04q0xpBVomzh2SwrMFhERMQAXBp0Tbri3AJwAU5x8T0A98RsLEulzMGpRazWdAAe+YEG7C+JitUFewDmP+2+XriL9WxtMgIDQ0REDMDJR96SLocArNQt438AbudQKStwqhCrB7pewnOgUjiNiNWf9gDMf9p9j6LwJFV366YQUQCIiAH4cUx8C8A5OC2GMwCX4LQiVn/TARieA5XB6blYnQ4mAKURXlXtnhC/ERERMQBLOsW/AGyG041wBuAOnF6I1ZAOwPAcqEIHpFgtBxSAkoZnid0O8RMREREDcDIj4mMA1sKpN5wBGIfTGbGrUgEYngPF4XRN7FoCCsDIK3g39UR8Q0RExABMpS+KrwE4AqeScAZg1WECUEdWLDwH0i9ZELt4QAEocj0F7958E18QERExAONbHSL+BuC47qpwBqAu1Tqxm1IBGJ4DbcOpUuxSgQWgFK/Au9p5IaKCIyIGYGzu/EXRfP8dwHfhDMBaOK2I1bJeMzwH0s3dI1anEFwASuT9CDwrrREiKiQiYgCmlnobT4kWxF8Br4QzAHWpTorVoK618BzoOZxqxeqqnwGo1Uz0wKs7khMiIiIG4FzdQddGN7b6bg/MiBLY/wGcDGcALsKpSqyKdACG50A6seJiVexzAGoDDWXwJiO5ICIiYgD+XcwCC8AF3VXhDMBKKI/F5r0OwPAc6AWcEp1ikwkgAJXBxpLmGFyVDclxRERExAAsh9IRygDcgNIoNtVhDsBeKLNi8zqYANRuFk/3NqeQVaMcR0RERAzARijvQxmAw1CaxGYuzAFYDqVcbOYCDEDt5Nmu3ZUUbEblOCIiImIAPoCyEMoAfAqlViwGU2EOwHtQXohFTSroANRuPt0Yh9FeRI4hIiIiBmBnynNDyEc4fA4wAFuhtYnZNMIcgOtQostitongA9BktgcmD+QYIiIiYgDKIpSvYvQtBofrAQbgUBWUajHrCXUAXklAyYjZRvABaHEvCu2THEdEREQMwHIou2J0C06fAgxAeQMlVS8mmwh1AEozlFIxOh0NTQBKYxLKOTmOiIiIGIDrUBKXxeQMnFqDDMBhaAti0LkU8gCshpYRkw2EJwClBEq/HEdEREQMQNmDckcMarrhEJcgA/ABtOSaaOUIeQDehlYqBl9SgQRg5Fvbn7OX7k30333VdKbyZfPkhphkoHTJsURERMQA3IC2JtoCnG4EGoAyCa1lVpw+JMMegI8T0IZFGbqBIAJwE07RU2IwD6VRjiUiIiIG4AC0+J/idB5KX7ABuAqDlv+Tg/6IIewBKHXQkrfEqReBBOA3XczTYnAfypocS0RERAxAeQdt74Ec9HAKykCwATg4BYOWz99k39gCEP4A/AMGqUtyUDWCCUB5Dqeym6KV6Gh9LMcTERERAzADg701+UVkIg5lUYINQFmAUVX6N/mv4uo4jkMALsdhEE1fkX2t1xBUAJZAqdMFWNQNp2Y5poiIiBiAkVKYvCuWH4pLYTARdAB+TcCipexN052ebWihDEB5BaP4s2X5r9NNMQQWgLeh1Z2Ug9a7oWzIMUVERMQAlOIkjD42nG9v/TTcNJeEQfzvQQegbMC7UAfgb1GYTS29aXiy8W4yAQQXgEOT0Mqun5R9Y31V0IrkuCIiImIASi9yMCyBB+D3+P+TAJQ0XAQZgDINk710+9VlEbl44tLCFAzm5PgiIiJiAA7GcWi1ncEHoLyHN69TIQ/AK/EwBeDNPVgkt5e6YZOR/3lE/2TvLpvbuPcojh8Ze+t/Gd1wGRwsuNFUybguMzMzh8kTN3ximZuYIidVmGMIMzOV+c1cSSuTLEerC15vcj5i6Td6/F0W26ZNnzFz1nuZEOk5FICYnG2SlHcHHAhAjDV2jEFWDw9APGbsuak7AhAPmP9ALkRE7Bk8ew4tc5+DSI+hAMS9Jkn3w5EATLvYTpze2vMDEC8YOy57rVsCEGNM0oY+DxERWz4uYit/MXoMEQUgXjRJ+RzOBCDuesQk9ABcEICFo01iT3zUTQE49RGTpFvegoiILeklDCktKy+qYMgMiPQYCsDBl5kk5HqcCkA8f6lJ4Ca4IQDxdJZJ6B50UwDiwyyTlOszICJiS+V3JIvmISRtfhXJRyHSUygA4fmXse3i/nAsAFH4sjmna55yRwBi8hMmgTHotgDE01eZJAx9GyIi9lSTrHkNlkEVZK0XIj2FAhAYNdLY0/c5OBiA8F6RZ7o2wAuXBCA+yDPn1CezGwMQg141tn2bCntERPLryAWvocV0kj4AHwcCgRxE9Aq9LYx+NRh3zaypyQHqA4GFyFxU/n0QEYuXLF1W76uEZVogMB0onL9s+fQVaOe9JcuWryzwImxV6O/yYfGsDgTWQCQeBSB6X21suP5+wNEABFKHmS7cci3gmgDEWyPMObx6F7ozAPHxJGPTVymwSURkOsm1aPVUFbkUwDSSBYhYRzIY/Wr9dIY8B9SRG9IbSDYixDeHEU1BRMwni9DYzLCNXkT5mhhR60NIkOQmAC3vp0MkLgUgcu42CfW9DY4HIPD+syaOrG+Gw00BiOfGmy4NK0T3BiA8E0cYGy79FCIitm0mt3jQZtDatcGuAzC4tS0Ap89hNABn+dliUWsAvuenZdt2RLRNNdcD2L6DrIFlJ1mRD0BEARhfRl9zTtc/BjgdgJbLBzxuOurzTTrgrgCEZ8i3Jq7sm3qhuwMQ6DUqyyTwxWNeiIjYt4VchlhdBuAu7l5aX70eqAu/r90YWHQrEGwmS3auDc7YQ/oLogFYW1Wxbe++/f5oIwJBkltrGoMHSkkeBHCIrEtD2PbD5FzEJaIAtGRck226MPLZJ4fD8QBskzrkpmFfZIWz9JFhLzzZD4DrAhB4ZdQtprOXPwQcCEAg/YpLzTl8eUUvJEFExNtMBuwHIPdvR0QdySO9EObdTZZ+jJBeTWSR1wpAbg0CVhwuRUjlAtIf+Wp9LVkDIJ3kUYTdSnIeokQUgPE9P2T8JaazYfemA3A+AGM9VfgULK4MQKDXxK86Tt+S+wzgRABafJ8/YuK5Zcx1dyE5IiIfk5xuPwCPIaqOrE1DxBryeDoiPm4mV0UD8AQiTpKnolOsR8Qs0p8D4DRZjrAz5C4vEhGRwg+uuOzSlgrMeuTl3Hfu/Qhukmdi5KEne+6ZB8c/clW2yRtxc9+b3s2H0x6efO+LN98y0liyr7r02dwBdwxG0kREzpL8wX4Azm4XgOWw/Ej+hKgmcm80AAsQMZv0vwbgZ7IKFk9BQUE+gHqyYjBCdpBnICL2eHLuGvf0W/flwH16mVhD4QK90KN4Mm/zPd3bN9yD/5SISA7JvfYD8Jd2Abgalu/II+9FHSPPWAFY50XEQZIfA/i1JRPbZDZb8fkLyQKc90Skn4n1OLqfiIhs95OL7AdgQbsAPAHLFnaw2QrAKljWRgOwltyJGMfIkwAGkk04/4nI0ybWGxAREQeUkjX/XQAeZwen4wfgcXIJYjxKNjwF7CYDOP+JyBUm1lcQEREHLCW3pqFN44wZKzvWXnqCADxM/ra2zar4ARjvTC9pFeRaFJDNH+M8ICJPDXp/yOf56MqzJtYNEBERB/gYTTlLznGyGMAgkqsQsS9BABaRNWgnfgAeIZsQaxv5I34ny+BqIjL17dffHPvV45eYkHvRhZRLTKyHICIiDvDuIhsK0WIgyY8A5JPci4jlCQLwDFmSOACLyePrEZFTXFxc2FKfVd455HS4lYhM/Dz3jaGmnavuQnxjTCeDICIiTjhK8o+LYJlN8hTC9pC/ehHyUVWCABxEsh4Raaf/PDMofgB+RPLYdoT9TNZ6EeYpIU/oMnCuJvKCiXVxGuK51nQyGiIi4oy5JBtmrvPiL18Zyap1CDtJ8u9C9NrXwAQBiDKSjQj5q5w8/lz8AMT3JIvzgcpHSe6E5QzpJ0/CnUQkftdNGh5vLtt08iBERMQZ/Y8xzF9lvfgQ4fMzpLaZzXsTBWBhA8kt5b+f3EJyJroIwI+rSB4vmxt+qToLSwHD5sG1RGRqnunk6jsQ4+0xprOR/SAiIg7xnmGr0+8hajot8zMTBSBu+4Mt9qd1FYA4u4NRf6SjRRN1GTiXE3nBxPHyB6+hTcY1Jp7xEBER5yzc2cCQitONHrR69FgFefgEEgcg1v9ewpC6I+8BXQYg1lfXMmT3jzmwWJM8AxcTkZQ8E0/WV1MmfvBo6rufvXPNqyau7FQ4SUREtk+91bdiOzqqvO3j7bDHu3DxwYs8SKBy3bx5vdDeD66/DJyI3GD+M+9AREQuSMfIU3A1Efn4KvOfGJ0JERG5sLRtID4AEXG33nkmeSNuhYiIXHj2LtrfQC6ohIi43ET1nz0iIlLCEP8/EBHXe8kkaUQKRETkAvQRQ3YF/81eHXBGHcYBHP9dlpF/1lpWbWShgiORrItpIuRkGS3TghxZgzAqsrcQAI2BNei1DI6Iu9/eSi8gaRnP4+4+n9fw5RvAGHh3vfkf2+cCgEnU/v7z28FUAGPh473m9N4/CAAARt3tzeaUVpY7AQDA6GvtrjSncG12KQAAGA9Ln241/7D65mEAADA+Xs4/etb81dzM8osAAGDMTO/ObFxs/rB6eXarFQAAjKept7s31z/sXNhYubJ5Y31h9urz14sBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMEo6h3uDYUIBw8HeYScAgLq6xwlFHXcDAKhoepjZ3293Awrotvf7mcN2AADVrGUOFgMKWhxkrgUAUMmXzJNWQFGdz5m9AACqeJJ5ElDcSeZUAAA19HPQCiiuM8h+AAAVdDN/BVTwI/NrAADlreVRQBUHeRgAQHkHeT6giuM8CgCgvGH2Aqro5TAAgPIyuwFV3M0MAKC8zAD1AYAFg/oAwIJBfQBgwaA+ALBgUB8AWDCoDwAsGNQHABaM+gAAC0Z9AIAFoz4AwIJRHwBgwagPALBg1AcAE8GCe0+378QZbM1tvgrUBwAWPDoWmsdxJjvN/UB9EwQAC760PP+bHXtQziMAozB8yujEtm3Xtm3btj2oNahtDGv7FtKbCVZxfvt71t7hvrMwrOzTJxcdqFqXCTNt7zMCbYzMC88cMDoNDrEkOLgEwIQ+fbbDkN9nMTRpE9dkhi8dCVVhH8WIBandoBvN7KkQvhOAQgghhHyC0xkHQw9yMdqbEETWwDzVjEQrs2qpGFoNR9jG6UrnkdUwTOM8qMKDqZieqGwuoy5q71RodnMzhASgEEIIIQHYSiUr+gE4GBe31NIA7D6b3BKdGR1HhiaqT4zbgE4oD7BIYjbndh6ARdPI8ojMaVHk+hwtAMeGhIREDSUZmW+88pZuEBKAQgghhARgK1OV+UhymYUBOGcL4yah0ax0MkDZFcBAdEJ5gEXGMP5g5wEYysHD+gHot2sc13dTA3A5GnVbsimb8ZOg2E7mwZdIAIoJJcdf3+kJq6388f3lcwghhPDyAIS1ARhD6v/0hnBomt0DcJp2sw4DsHAw10K1k9zTHIBN9kcxcioUg7gIwhcC8MLjr9effL09AY6U6OeXBvMVPfh4byWa1Pn51XUYa35+fu/QZMX/M1f7wXZz3v471egvrHTn/akmh+FwDeydh3tURdv/78VNgjLg+0hnLbEAQWJiF1eKuFaMuvywxA4+ib2LPzEQG/BNFkhRVrIEQ+g1hCw1EENZWYgkoYhUryLxRf+Nd8/umT1ll8mwseTC+TyPmixzzn3vPXOu+TCn8bL8A/C6J+LJyKijPwfeqRdFybqeMT8cFArFPyWAnqysp4l6DLxuIpelrHSikVkRmxuSlXUnRfFMufnmF7Ipjue10R/f6LAL4Busr5vfbvLJJzlEI7KuYiwrK0v/9LGHH03Pp2wtYGcBHphyx8fpZONNdt/5BTCLsUt4dlM/edwqgDR9PLuXq+llpLj4BfDYQT+i1Jcco7+OMuAIyXMTgJ2ksQDYRElYByCmlGEAG6jLFLchykxKjV990JjbSH85vCz/ALzuiXwFtNGfBu/Ui6FkXc+YHw4KheKfEcCRjE2fNpZFeGqGfg3gE0SjWIx3SWN0XxZh0Gg3ken350YmCGCvbDLzPovhogjT+rAIfV/4byRgJwF6XsE0LutBZgoYu0kogNPIwCaA9C4b6iGNO7S1ScUFs2GNk+I4l27o3gLo3BNEnODZfOI4nU43XTiVke26KIC8OcJyAphXAeAm6jKlAPwdZTuyKSXWIkLD4tJ2+otwRErb+G8RQN6pfEx1HwHk3fC3CiA/HBQKxT8mgPcPGvzc1W8ydqsrLoBZUy9jjE2dOjB27R1jN7wznrH+/Gl8jD3yyXj24KdWAbyfixln0tToTqZq6vVsZPtbpg5iE0ZpAigMcEkkl6vuvWcCey7XJnQvnF8AvYx94D6/AL7I2OM8SeNThTRHfvtfZ9yi/ve3I91aAHNPQWPugS2zA4hQlkc6FcAqunCqgbl/hgAeBrBZTgCpHWjxUlfJAXAqk1JmC4B19BfBE/zu3yKAvFP5mOomAsi74e8VQH44/IMoFEoAx18xgyj3XU2ruACaL9Gb1pu9O5HIdR9jo3Sxuno60dMDx/WyCqDzLcYmFRDHcg1g2lDWb0Qe5Y3oO0ETQGGAD9lVPYjomr7sDTLxMWPDzi+AdD1jl6UnCiDnM/YeaVxpXSlUSHLuN80Auf/9dq5bC+BBAFW7synC6eq5AJZ3EwGkiWvSSFIAqfbXbOoyXwDYT6lzEphNSgD/NHinKgHkh8M/iUKhBPAZF0VwPMcmJRPA7EHsXtIVa9DTRNSHjb1b351VAOnOZxhjtz75kMMsgPyHwS9wLWPThQEcn7GBpPHyS1nWW06YSyCArv6MsQeHvJKZXACfY9eTRg9+IjkllAFy/+vOAjgcQOlK0ileCATTuoEAcmQFUIx85r6u7K8CmKME8E9HCWC3QKFQAvguRbmPPZNMAAewCR6Kcg1j6UQ3xg0qd6xNAMlz32cswpsvjbQJoONNdinFuEsTQFEARy92G1ng+Q0lgQASjerDIvS6Kz2ZAF7NPiCNbBbRS0UK/B4xQN3/vqBuLYArgPo6ipMGYM6/WABT1gxesItSAJUAKgFUKJQAcp8bxXonE8B72VPGadSPiQYy1jMuVX3JRu7jt43VLOx2qwD2YGwAxXheE0BBAG2344cMowT+w8aLBFAj/dqoA17uTBTAJ9jlpDGRaTEUqRng7/zf3VoAw8BPZKINOCDwmTwXnYcZPTNkBTD/dJcmQZ6FWAA9TsGn8prhcFFS3Cu/80gJ4OmeK82ZJ4/vON0VAXTXJX8oSyVx7NUT46hzEEei7rysIgHkbcS4eWApAZQpWqZTYiQlx1V5YQLocpMAYTBP7p8ngK5GUigUf40AjuDX2I1LJoBvM9ZPZzx7g+g9dgvpvMsF0Er6kEGMvW4RwCv5Q1qiXjZdGIDu/IyxcW+99EouWXiUsQfEAqhxzfMPMvb/3AkC+Ax71/jaipQNkPtfdxbAfcAPZKKwqKgnEeW0trYiQmsEJ8VoXHdgXxAtR/cT1cY/7hn96dD2CqCMiJYZm1UnF8C0g37AX7rGQ5yHWluPUpz21tb2+J69lknQmgUXEesujre2TibH/o56wL/4MJnJnxWuAurLc6Lty8lKm5F5CenUli9sQaB5WRFx9C3XnvIBNWRil6lgq+OJZP/QBPi43jx0ah9wcnGNzYRqNy30YWtHezEJmRULEGjVMjDKUnCkKQhf84lCqwbML62Cr6H8i0ZzYauJhpVsBbaF957Xxop++t6H4Oz5bsqPRJosrrtG7sxYWY8JBNDUZg1P386Yn+ZG9r9wwWrruLCOKZmi8eLTki0BoKljtzu5TgnGc+aiVm3T5TkS3aAxcWdDBXw7Fq+z25clGCLBdvMQlp5C0/GZ+WIB5IdDQeS/G8jg29bW0lyK4d0TSaOidNlqUigUf7sAPsdMTCIawvokPgjaRtFTbHCGWQBfZuxu437c6cIARBOvv4VF6Hsz2W4yni4SQE7m9dqebQL49AR9myx+L7EiJQPk/tfNVwBLKJFz4MTnem8rdNodhgIUaT/tDwAxAexAnPakAriuHjH8u0nnR6DKNuPxPR8yfSTKwtiFHwjRWegsOE1xfqlCjJaNWnu7qfgQJ6yHKgXnQJ0p2bbGrwDYBLAGBmt5IofmAXEB/GYfdOaZxdQbhk7F/EoS8CXitBllGcPz9v9CBtUV0Dk+3FTYdtoNndlplAxnOXQ66pwAQsK6a6zjZQ3sThRA+TbunUaxndZxYRlTEkXjo2BNEDF25CQKoHA8O9sQI/hlo6gbeNFKeCQ0F1BSvmuAzh53kbl88yugU/UFxREcDo59wBZT3ap4A8rfHk9jWTYpFIrUBfA9xrzEuU4zP6kVwD4fxRmpnYmd4KYY1ycTQG55r5gF8DHGHrN4nCCARv6V//mEMfYpmRjBXzTi7s2upzh9tHwt5N7CrrUL4LOMjdFPdLNhpEiRL3/7rZq6vQDuAQLrZQQwZys0ov62wjphrg5CVgDXak0rYu2rL1AABVlYBbAagM8HjcXEmRkNGqxAhFUyAri6ygiFhT1NAjgLcgKYvgOGAG6MBvBVQONgIyX5Qmitu1ABPKRtuC0WJq457hXQ2BaLOMskgLUtAALQ2OeiRLJLAd5BrXUAQqK6a+zyGWV9yC538m1mHEcEf0O05qdyxQIoLhofBTVGk4q1iQIoGM+uxfEqobpzASwshSlUiJLwuWkslZgEsPIINAI+aJyQEUCaA/jqLM+ejKl/djgWIxit5OekUChSFsCPGXuWOC8xdo2MAN7G+hFHN6geFOMJiwB6pk0rIh1HL/YfswAWMMaX8+7TBFAUgHNJHzbeRQbZg9koivII60OcB8axSVHFnHYJca5mb9sE0HEre4aifMpuIUWqOH//3dn9BXAMgKbDZKexsrLSB+ytjEAariYAZec85Dx3ANhkmTAbUHX2Ia93uOYelZU1QJW2mTuJAB5vwsldGeRe3x7gE5e0AAqysArgAgR+GOOsPLQTpken1QJoOXsoj+p2z8a2TYkWUmnLvLgewKbPnXR6smYgOzzxZLdWoXnOL8VpXjLhMBWsUU+kAcGSWUUrP+cTtf9br5uyZ80zzfWFfiB45FgueUJhTX0cZMUaYbVWEp6gVpa2Hdj0xUrKOKypZjO3yjkAvl+VQQ7vDwEgOCZe2KN+bN+f0ejdWw9gOSVyQNvN7myqPHS2BeUAQuK60zAAvhUj8yg7Utb6MltZ5dts0TTMq5W9BMBSS6dax5RU0fzAMh/C605Tfk655sJeuwCKxvMC7KjOcXuGlYE/iVDUDe5SAG2/1FFu0bIg4CugBOo02TxQGwlWewD4yShfO4C5s4ob3d6aegB7ZQQwzfKqmp+Are5oXmEAHWszKS/nIICmQlIoUkUJYM44djnpZF7F+rnFAvgyXztLoxjFFN2An4C9e6hFAB1jWX/SeYGxh2MC+BxFuYrdQzGe0gRQEEALEX+38Itk4i1+d/Akxm4knYf1SJezvlxNMoeySTYBfD5+7+9UdjUpLvJXwe2BJjqTHZ3c1LrCpAxfApYJEzt6St4FDIR1kfoGwDynvAAKs7AKIFrWGo+S7qAoeX8A2K2beTNgtRB75tyF1phqtId4JKDMKb4LmCcSCJGOZx5QoauBtwnwGUbCt8k7CuChC7oJxFgT84QBDKMox4LA7NMU5Rcf0OzgzePi6fUDFflkZzeAhly9gwKIEBLXvbLByDnvQEJZpduMBFBjFN6fyTvV3jOSRfMjwrJGY3H2gF0AheN53krSaGwH8GVn3TAfwBk91H4AX7vJzhEAZ7mxmYINCwLzXHqX1AMVXgkBpFKgg3Ry64H2+MA8aPobwHJSKBQpT8H9GRtCUVxXMPY8CQTQOSH25+Tqq78ihK4b91wPInqH9ZpMGvfYngM4hA3WhS1jKutdFDvpPNTB1/1G8af5senCAC/37R3bzSg2wUUmrmfvU5T/YezNyRTl8fHslkz9KsPXdRF9g7EBFgH0DGFsqv5jL/YpKS5yAcxfDI2mFftdAp/xAmiOa0+5dcKsKiZZAayKB2kHUC0vgOIsrAK4wbSvYCzgKk0I4roR6FwA1wIoa+Q1agawnkfC0TySE8BviPMt4FtLOkX13AeWwHQPzumfgeYLFMDl8T8Kxp/fcxxoWkk6G+Piu4BbLP8aIbJzEggcIp1ZXAAFdd9osg7K3WEvq3SbLwAf339h6c61eSIBlCiaH0CY956jA8A5yZFUBKCee5hzn5asuBtcAaAp26x6q8jGdwAauG47m2F+hXXwnLlOJTICuBcIFlKMDQAKKEJmBdCRZ0rDV0wKhSLVKbigL2MfPHxjfvodzzF2a75IAOlt9v6InjM03erF3r7SSe5Rg9itUf0azJ4ZkEH/vZQ9YhXAS8az8e8Nc1PBs48wdi2/9u/aa4YTUfZYNvT14VT0+vhHNAEUBZjYm72Vnkc9I7/eQ2aujC788UdQvzclu+d1L/Vm414mjfz3Gbv8vx56YNonjN2aFxPA+1988cVpH186iLHLJlKUKeoSwItaADm76hEleHxR8fl8Zg3QUkAcb9AyYW4naQGsJk7e10BYXgCFWVgFsN5htrgCvqz0h5M4szoXwIOAv5A4BT7gSx4JG0lOAOdRnIXAUoozB2gijWVxy+Tppl2YAH5OnDZepGIAtZb3G5fHmx8jHSeANWTjmOUspPt7ACFx3RcDCz0W1bOUVbrNLCDgJjMCAZQomj+qfJxiP7BTciQVAVhs7qj6TrphF4C1xPGcBDrIRo3Zq2m4jwfzIirtnE1AhVNCAOtagEWGurZyha5yGWkEgVmkUChSnoLT+7EI41iEJyaSUACfHcwYu48ivNabsQlXTWDs/UtI49HI9uPHRvYwyiqAlD6WRVpGdIsNvoOiuJ9jkbZOTQW1jyPRP0vXBFAY4FHG2KBnGGN9epCFq/gin/ul+NfoNYpiTHxHi9uXRbjcQzEB5PS+3klcHa8gxcUvgFT3YwNi+JYXJveZMHCUDGZbJszN8gKYRnF+BVAoL4CiLKwCWEYcL5+cXTGB49R1KoB59Za5mTYBs3kkFEsK4HJDIGMmyjmsfzW3H1hEcVxcwKQFMFBJnHLgOHcbfyPF2QlsbdSbb3MTZx//fiZ+AHx51osDQsK6e1osdy5k28sq24bOAVglI4CSRfMDFaYabAf2NcqNpCIANWS2u1xxNxwAwmSwFwjOICulVils4MFqgKDJ+A4B2C8hgNpnpXpxA/zvVGeAM2TwM98sNRQKNQVnvDGWadzwqJvEAkhZDzL9ernXnmKak12aTTFe07Ruwr2e/28TQPJe/giL8ObVr5COa1IvxtIpwo0fjGNs3FNFIzUBFAd4/LLoXj50kZXb2WWkM+VqTR/Z0El3Eif3jT69tY+e0OTTEMChV33y/ETSye/HBtDFjRJAzrGl4SA0AjOT+kwAOEsG1ovmR0oLoM9NcSYDWCcvgMIsLAJo6EYlgHR+H8JhMmgSCSA3ti9s935mGpHkBPBX4iwC6t0UZwaA/fpXzCGDZmDPBQngcctbOFr5x1ts1/Vl85tAKE7YWkruMs1Wl0FIWPfP9fpyquxllWxDnq1A8Ox6CQGUK5qfK5JxmV6G3EjS9j7ZcotUhrgb6oFlNpUNkZUWYCcZlPBgZ4CFZOD2Ae0yAhgC4CWNzXHd9FtvWD7b1ddSKxRqCnZ8NOX+EdeQDHeP4QqW9lhWEZm4Zsr/5FNSMq58JY3M5E0ezvXwhRHZkgFGvjBlIiXgGsteMbZ96LqXX7QpovPFx3s4SMDN7C03XfQoAeTUbSwLIsLuJD7jsS2znLBMmIekBXA2GWQA2CgvgMIsLAJoNHHwr3PYYk5EZWIB5CePDTYA6CkvgPZE5gDYZMIHzNSjnNlk0ASUpPoquDlcAMPWWKcArE9sfjyJALYB5WQ19JCw7iFb5x+1l1WqjcZD0Ji9c0O2WAAli+YHfrK9u264UQP58bykUwF0AlhE1sXlmWTBZVveXMqDlVpX7agBKJERwMoqvkq5hd/ekgugaZNBK9BEYhQKNQVfvAxgz1FXcI5lI+hfhRp9GQcB+CYn+sx3AM6RQXqKAlhOJvg0JiWAgiwkBHAWEHCQQXtnArgLCOaSwXoeOjUB3I4EtK++EQmUdVkA5yGBYXICOBf40mboIWHdVwG+SjI4ayurRBvOxgrECO+tEwigZNH8wHwyWAlgjHAkpSyAXr5rThMvYpw03gMmJc5M9haeEqBDRgBpJ9AQtU0fsJunYaeF/q0oFEoA6b0hI6kLjBlyB/3bUKNvQwA4legzhwB8TgahFAXwoO0tdF9KC6AgCwkBnMktRFYA9wIVZJOhtakL4CYkcEK/DNLG0S4LYBUSmCwngFVWbToNICSs+15gm9CrJdpwvHN2IIY/XSCAckXzAz/aem+dcCSlJIB8Tzlkojnh4sr1vAfswaqAarK6cVhKAI/pP68C6nNJYyQSIYVCIT0FKxRq9P0AIDPBZ7IB7CKDmhQFsM3mF7OkBVCQhYQAhgAUkSWIWAA3AFhpOx1akLoA7gHqV1sp1h8bt9rKoS4L4GzgzGormXICONtq6MMAhIR11/L3is+sS7ThNOasWbAVGj8KBFCqaH5gBZHF43KEIyllAayzXSya5wMWkYVMWHV0EQ/WABwhE0eBM1ICSLNja4cdwHLjAF2z2gopFAolgAo1+qTgpnMowWcabdenH0xNAC1rQasBHE50qrLkAijIQkIAP7fdq/y1SAB5cuusNyQgI3UBXAp8TYnUAjhNUsgL4CleJAsyAnjKWpVdAELCutfyFjr2x+bJtbFwbAV/cUeiAMoXzQ8ct/VesXAkpSyAjS3AV2QwnA85EwHN0wzaebAyoNSW9Vk5AZwPLCQqDAK1xgEaIoVCoQRQoUafJOknTixNmK+LEn3me+uFVm0pCiC8FGcVj7QKCOYT54/kAijIQkIAPQHLibnCls4EMAPW06ErgHpH6gK4Gwh4KIFCAEv+bAFcARxPTQCXAwGHVVRCwroXWt+InAl7WSXbWNgI4FeBAMoUzQ/4rb23rVI4klIWQJoNHLDddH2MrIQtotf4Mw+2B6hotFZqjZwAauqXQ4uAhabD5ltSKBRKABVq9ElyE4CJZDs/5Yn7zEyTDPgziOMKiAWwKbkAWpfhzgA7KOH87HoIBNCehZQA8l34vWa1EQggF6SwgzjOk8ARSl0AM1uSv+UtDCy/QAFc35kAfgOgMCUBDAEYY0kOIXHd24DjjcT5xl5WQRsBW4EViQLYdCFF81sKlbsQWCAzkuQF0Nj7t5Y9UTlwkmxYX7sSAg+m7f0b62N3vHICSGVAu1aIL03d/z0pFAolgAo1+iQJwfqMMs9c41lw9cBX5vO1i03aKBDANVwhkwlgs9u80NNOGgWmd5S5F4gE0J6FvABuANCWyyVT4lVwey1LgMsBrE1RALntNucTZ2PbD7VuXbcDacRZ/8fZkJMEHAOwrjMBdFdZnoGyoqz6kKQA5lYA+1xmVUNIXPellpe7hO1llW2Tt+vgvsnEaQL28FLbx5Rk0fwASixPtN4sHkliARR1wyEAByyPs5lDNmb4gHq+ZOj5OR7MvRWYW0c6PSuAMMkJoBZn7kSzMBZY3lCTFy7fWEjnQ6FQKAFUqNHnXggEa+JWVvAHjGW/P0y3VzpKYbxcanJAJIC7AUxOLoC68/F337ekkUbjXCAY28K5BSIBtGchL4CNpzQl8JDG4XoEOxXA03MB3zHTmzva3F0RwFoAP/EyZ/iBn6O/1G0Fvs6mGI3HgW0rScAMACc6E0CqgSmPMdyuJQSQ2mE8qafwJBdAQd0LtV4sIh7XLneybRq1M7Ju00P79vJS28eUZNH8MK02rwWwzykeSWIBFHbDFtM9HivrgfrELvwSQEPs47RmBOPBqmH0SaWW0WFZAXTWA0eBo5ajq/6YaVkSG0jj9PxwjYsUCoUSQIUafTbSEeHrc/lEVDm8pgVAQ67pFflzMsgZU8MgsG1mpdZsZgV+FghgGoAdqyvdeckeBO3DshkUYXUDgG9N3hG8aXhl2qw2NJUKBNCehaQA8qkZ/hXVs86GgXC7WAC5h+yI+o97ox/wFVFXBJB2AujIIY0N+wDUGmo5LxR1n6IwgKVcvn2+MkqgsQkIfOEhp1AA3W0AzhZThLyaAFDlkhVAj5bZzrqoOH6P5hYgJK67Vg4s/CaqZe1Ag72sMm24CZVkR5P/ogLwn+alto8pYdEsArgQwRqnVrP0Ki6y4pEkL4BGN3DBDSyKZnaugWulFXcpAF/50lVflW2Df2Y8mFvLfkU0gHcBl28pAaRlgPVO5pXRNDwUIWM7gDLj2NpD3Y3/Y+cOeprK9zCOP02q9T2wccUsbgP7Jq7YdlF3LLugb4JIqjo+WFUqWJTxQhUAFC3FCpCKOtxWAXQAnDgMA8KZwcQ4L+NyjhTOwLm9xwu2Z7jPZ1lO6L+/80v6TZq2+kQUgKLt66EptzrXPk/TtRbsiOdIMjEByy3rj+mt9DVyoa5MACJt/UMWHAKw8wLZ9bG/tZ0kV0qlufaaJuvpRm6XC0DnU7gJQPxjlSWrkYtlAtBWVOSL9a1x83S5SzhcAPp/JsnLT7fmrpO2z2gXd17Q7Zc5kp/De98t3YLjCa2UKBuAOGGdeOZt/0qKJEfhNgARnSSZ/a2/7TKZjaTIYvm5wzduvay2gRtZcuqNw1hdXbPWTrIrPbXYZk3nvH3UDjvlNDQ7a/hp8s7cwG3rtm8B5TfJbQA63AYUu0hO3Bh4auYf3+ZxUM0NlkwOP9obX/d185GVd29nEiR/CboPwHs0J3Yae0bmSSZv9LUudHH3Q/K8Wb9ZH0REASjavv0upWgzPohdj7I0RXauy3HHT4PN5QKwYZ2mt04BGNpiye16lNQ9p8XsrDIB6HAK9wGIzFaSlhsZuAlAXEqwJPkBhwxA3OzjrsmHPqdnYf+a7QuhQ3DQS9Pr8gGI2BXuuj4M9wGI2jvckYrCDMAyc7eE3rGkNewcgG6uybTbpvOjbdQOO+UwNKcArPnIkk5Yym+S+wC03Qb70Cy/wlHo1mtaVpthC0Ccs92p8Qa4D8D8qjlN2NVOcNfKKVs5z0FEFICi7TsoePEHWti1vgy7pd+StoRqas1ZkdbqR9kARP7CC5IvnQIQKKRoWpj2YU9sy2rNdBzlA9D5FC4C0HJ67ELfwIXaPNwFIE4MTNKUutqCwwWgJfo0QVNqPQKbU1NZmrpmok4/xrPPyEKCZKx8ACI8NkPL66kGuA1AS+xqlqYrZ2EFYNm5W4ozNCV7AOe4c3VN/dATWlJ9LQ6jtu2U49AcAhChqXmaxu/B4mqT3ASg/TZYgr3PaUq01uE/CT26tfXuajGM3QC0hEfbafl52QeXAWj5lWTHvoq+9Yym3OdCHjvqFvhLHCKiAHQk2r4Ty5d6H05HG7BfqPlexJaK90a/Xz4HFzKfmvxwFj4zWhg+deDRx9ElP1wocwr3/kUuwIWGutnCclMjjkim9mShI4b9GpuKheVuH/aMkskQnDXWxoP47wY/nR96UIOv56+b/mN66WvmHun4/sdhP5y5vyZyf7QwWxtyuVP2oTkHIFBTvDR0P3bITXJ1G25+VyxM12bgxuy+r8mfPTM0Gm3BUfCd6Bg631T/10WARUQUgKLtk49kGh72Sp/bHYoVgF51gcxCRPQWLNo+qYT3D7ArlCKn4GFp8g2ODQVg4CT2rJNPICJVtmmEIVIVYWMTUim+nsSdx3/5vbtZeNh1MgI5LgH4YcK2bkUv/DCLiGwYQYhURdDYgFRKB8nsKCynO0n+4IN31ZAvIcclAINZkothmEJjWTIXgYhU2XvjLESq4qzxHhUji9z2ua1n7FZ/iuT8GXhYlOyEHJcARDFH8nn61fl/Tr3gtl6ISLUN6j1YquW9MYjKkbsJ7kkW4WV3ye8gxyYA0XGHe3KdEJGq8xuGHyLavf8D8bYEv0gOBOBpp2MxyDEKQLRMpfhFbq4JHiAiceOTDyIV59sw4pDKCkw/XOy7eDcahhxvS83NGXhL/YfCq76pnpE1eIKI+A1jCSIV97th1ENERESqImYYzSGIVFTod8M4BxEREamSiGFs/AmRCvqzwzAiEBERkaoJbhrGRnNLGCIV0NjSvGEYm0GIiIhIFTXGDZGKijdCREREqivTHd/YNEQqYHMj3p2BiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgrsWJh5DE8QURERMKBQKAefz/+QCAILwgGAo3VPH9DIJCBk0wg0ABL77O5OBzMXmkfw1EKBQKBEBzcf0ZTHF4gIiIinSQX8ffzhrwDL0iRhWqe/yK5ACdXSje2g+RPOKhmkpw/hyPUTHIJB/2RoOlaHh4gIiIi+WckJ0KoNp/f789/k4BSAPaSnD8Ni9/vD2HHA27rqEAADnPbk/SVRfwPbm4fGUdJREREPtH0CNVWR7L7mwSUAjDWRfbjiyQ5hJIF8rOvAgE4fpgVu0tew1ESERGRPprajnEAKgCRKUTzTgEYPjlWjwoE4Cp5GV4JQBEREWnMkgtk19oxDkAFoMkpAE2VCMAkedUzASgiIiLTZCLSRQ7hG1IAKgCHPBOAIiIiMkem0UauwEGDHw7CNXBSE8JX+Td799LUVLb3cfxHVWx8D0wY4aBpnKfKEQMnGaRnDhnAm6C0AJEvBAVyNELEBryACGI0NnqiKDcTQQi0tkdFe9JYRfk2HnJdkmTl0k/PWJ9Zny37/1+bVPE9Re2iIVhjADZ6LAFl9qo8y4gt+PTP1C3UlQ3AOrOIfcHqA7DVY71gCcAFX+0BaFavfGb7/1pDALYGVcTs/k8D8MvJGfsM83041hzHcRznfBRWtA74C5vp2sAYRL6teSTDe3YvDuHtTzP60a8vHo8QeD45H1PO2e3t98rb2d7eUcrJ7e1tjxpvbodh6W6LMi5tbwOEDy8Oq8DH7e026dZi6gu+rXhLB1RsfiMeZfP9G2kqNaH0LOPEzvcA0cvvz5r7FS1r5q/kTjQszVx8HiDw/foFSwBODd/YJPzqTqdkf3BF+988XLVHxU73JsYgMvxBup8aX3yhMADrXz8egcur9fkANGdoOZwCsH3IY05qX73EmY3OP18GiPZd8+rc4f3abAG4/MPQ2R8/XIHHw90xGUd279/eHtehO+aLx3PfU//RD5n5lDS/XoJA2Rne5cUQjPTt++U4juM4x9Y4jHgUDEFPwYURsh7/pryrcbJC88rz9EfJetVesm80Ck/yhdDoSZIR7YkppYe8pAqEYF33cxOet5Qa4N8ma6duHmi0zMrpDpP18oGMgmVN3+UGJnUiREZovVQA+gfI2ViQ5cEV738TGA2qyPwYGeEV03llL9zeJONKZy4AzYoHGI3mpNbV7WeWPMNkfVvwAOu2AJzAmCv8cH08JZXd/Rt5O8UDzDMMwfruFYBAuRn1+fsFfpHjOI7jHFfbsCVpH25IhnealHAAILKurOUAQPTZ0Z7qGCAlQsrIeuUAbJgEwqSNVxWAE5gBc8UDWp6aDaZNAJaeJQX3AUZexaPAZX8tAVj/GXhGSrSpOABnx8wi3Dgpy4Mr3H8N+FrYf+bLRgDOms6zX/DeJWVzE4icrD4ALavbz6zmAVJGosD2QvUBaD5czwIAgUuy7F5zAP70nJRAmRlNlwEu940AuAJ0HMdxjqvO7A/lKWBWxiCwdL8j5vX/EgbalDYPhF+c8KpjeQn4pDTvAJD8a0GnO+9EIdBeMQBHeT7e4m1tGgI20/1VFwzOArvBYNBbIgDvBEjMf9G5lmHgmb9wQMMSMHTQKs/BBjwBGq2zUsaBvSlJntsB2KshAOMDfLx3Us3rN4DvdYUBeCECPOny6EvbN+B5q8o8OLN/L7DoU5EmIDD9s0/NK31EhiBZ6cI1YOzaTF3swrUxkp8LAzB2+HwDsBY8ZE5qX91+Zm0Ar1aaFdzd32S4XADW/TA0lvtwvbxXrzr/6zBEz5Td3RsMTsBY8JC3QgA+Jtp/qXOmyz7DMwYj1xokdQ0AU3Icx3GcY2kn+0dAYs9hWnkfopBsVlrLCGzHdKg1DmMtSlt4BeEL+R/cX2NKewP8x1spALkyo5TYDtBT6SWQEMCd7IAJYEMFA6aBu8roIaWx3KzYGGx4zf2mqg9AGPIpxZMwX2gCcAO4r4xVYFWyPjiz/zKw4VOR4GPgrNJ8GwDJChf8YRg5qbSZ51AQgOZ9jKKTWla3nnkFeHxaaVfDlAtAM9R8uPq+KO2vALyqK7+7eQmkQgASXq8wYw0CB0pbWII9HUeO4ziO412CF0oZhJBpkI8wtqCse0C7Dl0HE0sPonBThxrCsNSsrHfAvUoBGPErwxOHZDUBmIgpo+4bcHB0gB945VHWsAlAy6wLwNXc/Sa3fl+oIQAHzimjPVpcV3PAUG7Tc6+AB7I9OLN/d7R0/+kRsKWs08+BZIUL74BlZe1GqwxA++r2M3+GcL7DLtUUgB9hacacEVYsu9ccgFdVYcYdSChrLtHTpePIcRzHceaALqX8DLxR1gywrBzf6MbGX9kf+lvKG9zYmNChZWBOOa2f4VulAJw0N4FINQF4oJwLIXhxdMB92GxXjj8KNJabdQKYlUWFABxXTgK+FvyDLQh1KKc9AD2yPDiz/9koDJ1WCZNwo/VIDibLX/CGYFh576oLQPvq9jN/wNxQ8r6sIQAvmBpOGYBhy+61BuAVqfwMDcOQjjvHcRzH6TfvfmxjWmkcnp2TYQptSkU2ICFjDaLnKwTghHKWgdOVA3Akprz/Qjx2ZEAC3svoAxrLzQoGoP8fBqAJxy1IHP0HvggMyngCfZYHZ/ZficLeOZXQugmflNcMJMtfOAO0Ke9NdQFoX91+5tcQ8ClvtYYAvA+hmPJewNOYZfcaA/CuVH6GeiDcqePNcRzHcRrDcF0Z1yDQrIyv8FVFbkLIqyIRuCPjAFivEIBtyjkD1FcOwAEZ14D6IwPCsC/DvARim7UIDE3V1R6AbJrqeQ2vjv6DdqBbRg/QaHlwuf0fBuCbR6V0AT/JGIOk/YJ5NHm71QWgfXX7mTfglYy1GgJwFBZlrADNlt1rDMC/pfIz1AWExpt1nDmO4zjOMvDA/NaMt+ZXZoMqMggDKuIBbspYAHorBOCucm5VF4B/ypgHTv04oBVYk/EJaCw7yx8GWNpa/rXqACw+0fWiAJwD2mU8BE5aH5zewrOfAkCDSlovaKn3kCx/YQfGZAQDVQWgfXX7mZMwLKOthgBMAE+MPeCBdffqA9Cc0D5DugsQ/Xj9lkfHleM4juO8B7pzMO9jxGFcRbZgUkX8wBkZWoKefzsAr8mYyQw0A34DDmT8VDEA1XWDjJefTv57AbgM0dMyHgAH1gent2StqqR7EAjK2Idk+Qv98E2GXlUVgPbV7We+DD0y6msIwCsUabLuXnsA2mek+HbI2Bx949Nx5DiO4zh+Cu0qbQzeqsgTGFWRXaCl4Cf34L8dgG8LYmPeDMhs0CVjvXIAqvX+ABnR695/KwDXYEQFm86ZB2cNQB6plDV4VidjB5LlLzyBDclIVhWA9tXtZx47GuVfagjAMYq02XevPQDtM9Jm30XI6GuX4ziO4xxDtyk0qLQ+eK0iq5BQkQWgW4YvADf/7QCclnELaPlxQDOwLGOicgCm+JffvSRl9N8KwIfAjIw2oN08uFIBGH3kD0H4g0p4A/hlDEGy/IVViMuoC1cVgPbV7Wfugy0ZTTUEYB98nT2q0b577QFonZHjO/NpbwRgs0WO4ziOc/y8BD4awOW6XFFslezFuIrENuGijFPASnE6DP2/AvBjQTdd+HFALAA7MrYqBaAxMxEB3lgC0BywugCcBeYLNq0v9eDM5T+kuShcaVaxKWBdRhyS5S/cBr4oz09VAWhf3X7mPUjKWK4hAPfySxm23S0B+LP5qhIBaGbYBef2gG2vHMdxHOe4aQIeyXgDnFHKKizFVOghcEJF+mBDxgrwQYfuQfSccr7/vwIwJGMangWPtMlLGJKRrByAxm7YxF5ePySU00G1AVgPXDu6aaTO9uDM7W4De14ZZjATymsEkuUvnAWalLdeXQDaV7ef+S6E65S3U0MATpueN2y7Fwfgr8BVs2fpADQz7P40Jek4juM4x8g+hBtlnI7AVj6VppT3prt7V5InDLeVN9XdfSsbBaF65Q3D5/yP8E5lPaCqAHxgCUDMhdM3YPRoj+0c2aAhXF0Amn2/y8jfUDm9VQegPkLCZJHnM7yT7cGZ28W+AhdVLAkfTYdfBZLlLywE4LXyBm0B2FsUgJbVrWdeB84oL1FVAJp1O1TEvrvGYUk5rWDeOvfGSwegmWF3AliR4ziO4xwzvhA80Y/ewUirDnnHIJEvjCbgarYWIvmC8oRgMPcOxoZyzgKDSmnHvN/qHa0cgB+AeVsA9itnFfj9aJvMApPK+YVKATi/+viTcvqhTwXuY34vXH+j+gBcA64p5y4wJ+uDM7f78hL4SUVuF/4VDpIVLgxBoEtZzZGSARiBi0UBaFndeubTIxBvML1VQwB6x+BP5U0Pje9adzffjlbJ7P8/r7lSHID2GR3jk/FGZT0A3shxHMdxjpmHwB/60Zn8+xzj+YyTPAkIeXSoKwp7HmW8yP/KbhHzmu5MBCIzSoldhmibUjyLVA7A88AnWwDyuzLmgLjnaJvUDQCXlNEWrhiAd+FpvfnLcgyrwAMg3qEU/w2qD8AvlyHwQRl/AEmv7A/O3G53BEZ+VqGOCGx2mldbIFnhwjrmj8QFFykZgN/hfVEAWla3n3kH89w6PlcXgGZh8x9ngNXyu2sFaDPFDvQorQdLAFpmXIhCj7Iu5jat636/+pscx3Ec53j4CiGfflS3BHtK8SaB/6ZDrvMjMG7aJdGlQ/XTwKTJkfDN9K0OHmNSbAeI/nIqeOJSkqWBigEYW4Jwd6s8JQLwBtEJj6TYT2PAugrapD0Kz3qDkoK9I/yvUgC2ANu7Spn6DkypUBII3fMHmyaesjdSdQBqHnieXs/7KASBTlkeXMHt3gA3Gkq+JnLjqg4t7MBjSFa6MAoMnUhH7AaheKkAHAYG6+UxAWhf3X7m1jjwYiHdVy95tVldAJoP1/4FHfJNhGGsofzuOgE8nw16fflQZLTJc35llOikJQAtMxaBcV86eH8B9vI3fCzHcRzHORaaA3BXR+1A9IJSTsSBwPt3WwmAO0Gled4D/Kf/7l4YGDivjPUw8HRo+sljgK2YMr7ESYkCPBytGIAaJyUwXCIA1yZhbGN69DPAvora5BrA5cn9ycuQbKkUgHoH8H56cOs/AHdUpCuaXz0yE6o+ADUI8PLr/mIciPZKtgdXcLuLwGJMBeoWAfqGp4ci8OItJCtd6PgMRBP//TMRTT30wgA0Zws8NQFoX91+ZrU9AyJ7d4f7IOIPVRmA5sMVTWzd/RgCeGTfPWsSIMqa+S+IQurolgC0zGgPAU+HL65ORoDQqXx48kGO4ziOcxy8BQ501AfzemnHNjnR+8rx9ZPXf045TWPkfVJeyxJAJieqCEDdJiVeKgAbvpFzXSXapDdK1vZMZ8UArPsTY79OxZY3yRjrUi0BqN4AOSN/yfLgivf37mEeneF9Z77KZzqvzIX6JObbVjIANR8hxW8C0LK65cxF3/RQm2oKQHUMkHdlTvbds1q/krKltOYEWe+81gC0zPgQIi/eYv6PR8gjx3EcxzkOBiAeU4Hv5ge8b7mPtMScZFzdIO3zfclovr1ESqC/RTI69iMAk12qKgD1MBkAOkoEoLwvNklZnFLJNmnvjwJE+z2qHICK5Y6xuTirklq+BoDw6gXVFoA6Mf2MlNDgBdkeXIn9m68A6yqyniBlZEIynVfuwrm1z6RcnpMlALW7NwKsmAAss7o9ANUxGCFl4FfVGIDy/Z4gLf6iVbLvnhPreYkZ7Zt4DvC/lZjsAWiZUf/pKWmfP3mU0TAZXXqkDMdxHMdxfjvTe++vGRXomOpee9ipAsFT62srTQsq4HvQtutR9c41dTWrVABKDeu99251yKp56tGlP86rWudnV97+fqtVVo2dbf6g/oHWljdrf7Sfk+XB1cp/9dLynKeGC95T6393z9apDG/nlL/q1e08LSt/r+zqH5k56L4321D97gsH7easdTNTHxb+4Qzf7lxv7/qRrTuC/9duHQwAAAIwABz3mGKJKYAA9rmjuOwBAH8AAQAQQAAABBAAAAEEAEAAAQAQQAAABBAAgJHbngAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEwBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwjbrny6lfSVgAAAABJRU5ErkJggg==" }),
  category: "header",
  attributes: {
    contentt: { type: "string", default: "Pricing Plans" },
    contentUA: {
      type: "string",
      default: "Start building for free, then add a site plan to go live. Account plans unlock additional features."
    },
    contentUB: { type: "string", default: "Currency" },
    contentUC: { type: "string", default: "Argentina (ARS)" },
    contentUD: { type: "string", default: "Australia (AUD)" },
    contentUE: { type: "string", default: "United States (USD)" },
    contentUF: { type: "string", default: "Canada (CAD)" },
    contentUG: { type: "string", default: "France (EUR)" },
    contentUH: { type: "string", default: "Japan (JPY)" },
    contentUI: { type: "string", default: "Nigeria (NGN)" },
    contentUJ: { type: "string", default: "Switzerland (CHF)" },
    contentUK: { type: "string", default: "United Kingdom (GBP)" }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes;


    return wp.element.createElement(
      "div",
      { className: "bg-white" },
      wp.element.createElement(
        "div",
        { className: "max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between" },
        wp.element.createElement(
          "div",
          { className: "max-w-xl" },
          wp.element.createElement(
            "h2",
            { className: "text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl" },
            wp.element.createElement(RichText, {
              value: attributes.contentt,
              "default": "Pricing Plans",
              onChange: function onChange(newtext) {
                return setAttributes({ contentt: newtext });
              }
            })
          ),
          wp.element.createElement(
            "p",
            { className: "mt-5 text-xl text-gray-500" },
            wp.element.createElement(RichText, {
              value: attributes.contentUA,
              "default": "Start building for free, then add a site plan to go live. Account plans unlock additional features.",
              onChange: function onChange(newtext) {
                return setAttributes({ contentUA: newtext });
              }
            })
          )
        ),
        wp.element.createElement(
          "div",
          { className: "mt-10 w-full max-w-xs" },
          wp.element.createElement(
            "label",
            {
              "for": "currency",
              className: "block text-base font-medium text-gray-500"
            },
            wp.element.createElement(RichText, {
              value: attributes.contentUB,
              "default": "Currency",
              onChange: function onChange(newtext) {
                return setAttributes({ contentUB: newtext });
              }
            })
          ),
          wp.element.createElement(
            "div",
            { className: "mt-1.5 relative" },
            wp.element.createElement(
              "select",
              {
                id: "currency",
                name: "currency",
                className: "appearance-none block w-full bg-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-base text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              },
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUC,
                  "default": "Argentina (ARS)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUC: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUD,
                  "default": "Australia (AUD)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUD: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                { selected: true },
                wp.element.createElement(RichText, {
                  value: attributes.contentUE,
                  "default": "United States (USD)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUE: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUF,
                  "default": "Canada (CAD)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUF: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUG,
                  "default": "France (EUR)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUG: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUH,
                  "default": "Japan (JPY)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUH: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUI,
                  "default": "Nigeria (NGN)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUI: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUJ,
                  "default": "Switzerland (CHF)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUJ: newtext });
                  }
                })
              ),
              wp.element.createElement(
                "option",
                null,
                wp.element.createElement(RichText, {
                  value: attributes.contentUK,
                  "default": "United Kingdom (GBP)",
                  onChange: function onChange(newtext) {
                    return setAttributes({ contentUK: newtext });
                  }
                })
              )
            ),
            wp.element.createElement(
              "div",
              { className: "pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center" },
              wp.element.createElement(
                "svg",
                {
                  className: "h-4 w-4 text-gray-400",
                  xmlns: "http://www.w3.org/2000/svg",
                  viewBox: "0 0 20 20",
                  fill: "currentColor",
                  "aria-hidden": "true"
                },
                wp.element.createElement("path", {
                  "fill-rule": "evenodd",
                  d: "M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z",
                  "clip-rule": "evenodd"
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
      { "class": "bg-white" },
      wp.element.createElement(
        "div",
        { "class": "max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between" },
        wp.element.createElement(
          "div",
          { "class": "max-w-xl" },
          wp.element.createElement(
            "h2",
            { "class": "text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl" },
            wp.element.createElement(RichText.Content, { value: attributes.contentt })
          ),
          wp.element.createElement(
            "p",
            { "class": "mt-5 text-xl text-gray-500" },
            attributes.contentUA,
            " "
          )
        ),
        wp.element.createElement(
          "div",
          { "class": "mt-10 w-full max-w-xs" },
          wp.element.createElement(
            "label",
            {
              "for": "currency",
              "class": "block text-base font-medium text-gray-500"
            },
            wp.element.createElement(RichText.Content, { value: attributes.contentUB })
          ),
          wp.element.createElement(
            "div",
            { "class": "mt-1.5 relative" },
            wp.element.createElement(
              "select",
              {
                id: "currency",
                name: "currency",
                "class": "appearance-none block w-full bg-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-base text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              },
              wp.element.createElement(
                "option",
                null,
                attributes.contentUC,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUD,
                " "
              ),
              wp.element.createElement(
                "option",
                { selected: true },
                attributes.contentUE,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUF,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUG,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUH,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUI,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUJ,
                " "
              ),
              wp.element.createElement(
                "option",
                null,
                attributes.contentUK,
                " "
              )
            ),
            wp.element.createElement(
              "div",
              { "class": "pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center" },
              wp.element.createElement(
                "svg",
                {
                  "class": "h-4 w-4 text-gray-400",
                  xmlns: "http://www.w3.org/2000/svg",
                  viewBox: "0 0 20 20",
                  fill: "currentColor",
                  "aria-hidden": "true"
                },
                wp.element.createElement("path", {
                  "fill-rule": "evenodd",
                  d: "M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z",
                  "clip-rule": "evenodd"
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