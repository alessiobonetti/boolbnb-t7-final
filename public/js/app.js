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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\resources\\js\\app.js: Unexpected token, expected \",\" (57:25)\n\n\u001b[0m \u001b[90m 55 | \u001b[39m    $\u001b[33m.\u001b[39majax({\u001b[0m\n\u001b[0m \u001b[90m 56 | \u001b[39m        \u001b[90m// Rotta response\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 57 | \u001b[39m        \u001b[32m'url'\u001b[39m\u001b[33m:\u001b[39m \u001b[32m'{{route('\u001b[39mguest\u001b[33m.\u001b[39mresponse\u001b[32m')}}'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m                         \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 58 | \u001b[39m        \u001b[32m'method'\u001b[39m\u001b[33m:\u001b[39m \u001b[32m'POST'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 59 | \u001b[39m        \u001b[32m'data'\u001b[39m\u001b[33m:\u001b[39m{\u001b[0m\n\u001b[0m \u001b[90m 60 | \u001b[39m            \u001b[90m// token\u001b[39m\u001b[0m\n    at Parser._raise (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:748:17)\n    at Parser.raiseWithData (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:741:17)\n    at Parser.raise (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:735:17)\n    at Parser.unexpected (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9097:16)\n    at Parser.expect (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9083:28)\n    at Parser.parseObjectLike (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10896:14)\n    at Parser.parseExprAtom (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10464:23)\n    at Parser.parseExprSubscripts (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10122:23)\n    at Parser.parseUpdate (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10102:21)\n    at Parser.parseMaybeUnary (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10091:17)\n    at Parser.parseExprOps (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9961:23)\n    at Parser.parseMaybeConditional (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9935:23)\n    at Parser.parseMaybeAssign (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9898:21)\n    at C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9865:39\n    at Parser.allowInAnd (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:11521:12)\n    at Parser.parseMaybeAssignAllowIn (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9865:17)\n    at Parser.parseExprListItem (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:11282:18)\n    at Parser.parseCallExpressionArguments (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10323:22)\n    at Parser.parseCoverCallAndAsyncArrowHead (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10231:29)\n    at Parser.parseSubscript (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10167:19)\n    at Parser.parseSubscripts (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10139:19)\n    at Parser.parseExprSubscripts (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10128:17)\n    at Parser.parseUpdate (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10102:21)\n    at Parser.parseMaybeUnary (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:10091:17)\n    at Parser.parseExprOps (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9961:23)\n    at Parser.parseMaybeConditional (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9935:23)\n    at Parser.parseMaybeAssign (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9898:21)\n    at Parser.parseExpressionBase (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9843:23)\n    at C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9837:39\n    at Parser.allowInAnd (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:11515:16)\n    at Parser.parseExpression (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:9837:17)\n    at Parser.parseStatementContent (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:11781:23)\n    at Parser.parseStatement (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:11650:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:12232:25)\n    at Parser.parseBlockBody (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:12218:10)\n    at Parser.parseBlock (C:\\Users\\alesi\\Desktop\\Boolean\\Esercizi\\boolbnb-t7-final\\node_modules\\@babel\\parser\\lib\\index.js:12202:10)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\alesi\Desktop\Boolean\Esercizi\boolbnb-t7-final\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\alesi\Desktop\Boolean\Esercizi\boolbnb-t7-final\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });