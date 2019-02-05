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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 174);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1:
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),

/***/ 174:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(jQuery, wp) {

/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

	// Update the sites color theme
	wp.customize('agncy_color_theme_name', function (value) {
		value.bind(function (newval) {
			refreshColors();
		});
	});

	wp.customize('agncy_override_color_theme', function (value) {
		value.bind(function (newval) {
			refreshColors();
		});
	});

	wp.customize('agncy_override_primary_color', function (value) {
		value.bind(function (newval) {
			refreshColors();
		});
	});

	wp.customize('agncy_override_secondary_color', function (value) {
		value.bind(function (newval) {
			refreshColors();
		});
	});

	wp.customize('agncy_override_tertiary_color', function (value) {
		value.bind(function (newval) {
			refreshColors();
		});
	});

	var refreshTimeout = null;
	var refreshColors = function refreshColors() {
		clearTimeout(refreshTimeout);
		refreshTimeout = setTimeout(function () {

			var ajaxData = {
				color_theme: wp.customize.get().agncy_color_theme_name
			};

			if (wp.customize.get().agncy_override_color_theme) {
				ajaxData = {
					color_theme_override: true,
					primary_color: wp.customize.get().agncy_override_primary_color,
					secondary_color: wp.customize.get().agncy_override_secondary_color,
					tertiary_color: wp.customize.get().agncy_override_tertiary_color
				};
			}

			// Send the colors to the backend less function, to generate the css rules
			wp.ajax.send("refresh_customizer_colors", {
				success: replaceStyles,
				error: handleError,
				data: ajaxData
			});

			// If we have a successful response from wp.ajax we insert the data like this
			function replaceStyles(data) {
				$("#lh_color_rules").text(data);
			}

			// On error we dump all data into the console
			function handleError(data, two, three) {
				console.log("error", data);
			}
		}, 200);
	};
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(1), __webpack_require__(9)))

/***/ }),

/***/ 9:
/***/ (function(module, exports) {

module.exports = wp;

/***/ })

/******/ });