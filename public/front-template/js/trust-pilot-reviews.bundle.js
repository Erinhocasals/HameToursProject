(window.webpackJsonp=window.webpackJsonp||[]).push([[38],{435:function(t,e,n){"use strict";n.r(e);n(239),n(240);var r=n(1),o=n.n(r),i=n(49);function c(t){return(c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function u(t,e){return(u=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t})(t,e)}function f(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,r=a(t);if(e){var o=a(this).constructor;n=Reflect.construct(r,arguments,o)}else n=r.apply(this,arguments);return s(this,n)}}function s(t,e){return!e||"object"!==c(e)&&"function"!=typeof e?function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t):e}function a(t){return(a=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}function p(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function l(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function y(t,e,n){return e&&l(t.prototype,e),n&&l(t,n),t}var b=new(function(){function t(){p(this,t),this._isScriptLoadInitiated=!1}return y(t,[{key:"loadScript",value:function(){this._isScriptLoadInitiated||(this._isScriptLoadInitiated=!0,i.a.loadFiles([{type:"script",src:"//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"}]))}}]),t}()),h=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&u(t,e)}(n,t);var e=f(n);function n(t){var r,o=t.el;return p(this,n),(r=e.call(this)).el=o,r._setupEventListeners(),r}return y(n,[{key:"_setupEventListeners",value:function(){new IntersectionObserver((function(t){t.forEach((function(t){t.intersectionRatio>0&&b.loadScript()}))})).observe(this.el)}}]),n}(o.a);e.default=h}}]);