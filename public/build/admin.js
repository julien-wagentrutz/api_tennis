(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["admin"],{

/***/ "./assets/imports/admin.js":
/*!*********************************!*\
  !*** ./assets/imports/admin.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_admin_admin_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../styles/admin/admin.scss */ "./assets/styles/admin/admin.scss");
/* harmony import */ var _styles_admin_admin_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_admin_admin_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _scripts_admin_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../scripts/admin.js */ "./assets/scripts/admin.js");
/* harmony import */ var _scripts_admin_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_scripts_admin_js__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./assets/scripts/admin.js":
/*!*********************************!*\
  !*** ./assets/scripts/admin.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.array.for-each */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/es.string.link */ "./node_modules/core-js/modules/es.string.link.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

var itemsMenu = document.querySelectorAll('.admin--menu nav ul li a');
var asideMenu = document.querySelector('.admin--menu');
itemsMenu.forEach(function (element) {
  element.addEventListener("click", function () {
    console.log(element.dataset.link);
    document.querySelector('.admin--menu nav ul li a.active').classList.remove('active');
    element.classList.add('active');
    var oldItem = document.querySelector('.section--doc .block--doc .item--doc.active');

    if (oldItem != null) {
      oldItem.classList.remove('active');
    }

    var newElement = document.querySelector(element.dataset.link);
    console.log(newElement);
    newElement.classList.add('active');
  });
});
window.addEventListener('scroll', function (element) {
  var body = document.body,
      html = document.documentElement;
  var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

  if (height - window.scrollY - asideMenu.clientHeight < window.innerHeight - 150) {
    asideMenu.classList.add('fixe');
  } else {
    asideMenu.classList.remove('fixe');
  }
});

/***/ }),

/***/ "./assets/styles/admin/admin.scss":
/*!****************************************!*\
  !*** ./assets/styles/admin/admin.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

},[["./assets/imports/admin.js","runtime","vendors~admin"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvaW1wb3J0cy9hZG1pbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc2NyaXB0cy9hZG1pbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FkbWluL2FkbWluLnNjc3MiXSwibmFtZXMiOlsiaXRlbXNNZW51IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiYXNpZGVNZW51IiwicXVlcnlTZWxlY3RvciIsImZvckVhY2giLCJlbGVtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImNvbnNvbGUiLCJsb2ciLCJkYXRhc2V0IiwibGluayIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFkZCIsIm9sZEl0ZW0iLCJuZXdFbGVtZW50Iiwid2luZG93IiwiYm9keSIsImh0bWwiLCJkb2N1bWVudEVsZW1lbnQiLCJoZWlnaHQiLCJNYXRoIiwibWF4Iiwic2Nyb2xsSGVpZ2h0Iiwib2Zmc2V0SGVpZ2h0IiwiY2xpZW50SGVpZ2h0Iiwic2Nyb2xsWSIsImlubmVySGVpZ2h0Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNBQSxJQUFNQSxTQUFTLEdBQUdDLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsMEJBQTFCLENBQWxCO0FBQ0EsSUFBTUMsU0FBUyxHQUFHRixRQUFRLENBQUNHLGFBQVQsQ0FBdUIsY0FBdkIsQ0FBbEI7QUFJQUosU0FBUyxDQUFDSyxPQUFWLENBQWtCLFVBQUNDLE9BQUQsRUFDbEI7QUFDSUEsU0FBTyxDQUFDQyxnQkFBUixDQUF5QixPQUF6QixFQUFpQyxZQUNqQztBQUNJQyxXQUFPLENBQUNDLEdBQVIsQ0FBWUgsT0FBTyxDQUFDSSxPQUFSLENBQWdCQyxJQUE1QjtBQUVBVixZQUFRLENBQUNHLGFBQVQsQ0FBdUIsaUNBQXZCLEVBQTBEUSxTQUExRCxDQUFvRUMsTUFBcEUsQ0FBMkUsUUFBM0U7QUFDQVAsV0FBTyxDQUFDTSxTQUFSLENBQWtCRSxHQUFsQixDQUFzQixRQUF0QjtBQUNBLFFBQUlDLE9BQU8sR0FBR2QsUUFBUSxDQUFDRyxhQUFULENBQXVCLDZDQUF2QixDQUFkOztBQUNBLFFBQUdXLE9BQU8sSUFBSSxJQUFkLEVBQW1CO0FBQUNBLGFBQU8sQ0FBQ0gsU0FBUixDQUFrQkMsTUFBbEIsQ0FBeUIsUUFBekI7QUFBbUM7O0FBQ3ZELFFBQUlHLFVBQVUsR0FBR2YsUUFBUSxDQUFDRyxhQUFULENBQXVCRSxPQUFPLENBQUNJLE9BQVIsQ0FBZ0JDLElBQXZDLENBQWpCO0FBQ0FILFdBQU8sQ0FBQ0MsR0FBUixDQUFZTyxVQUFaO0FBQ0FBLGNBQVUsQ0FBQ0osU0FBWCxDQUFxQkUsR0FBckIsQ0FBeUIsUUFBekI7QUFDSCxHQVhEO0FBWUgsQ0FkRDtBQWdCQUcsTUFBTSxDQUFDVixnQkFBUCxDQUF3QixRQUF4QixFQUFpQyxVQUFDRCxPQUFELEVBQ2pDO0FBQ0ksTUFBSVksSUFBSSxHQUFHakIsUUFBUSxDQUFDaUIsSUFBcEI7QUFBQSxNQUNJQyxJQUFJLEdBQUdsQixRQUFRLENBQUNtQixlQURwQjtBQUVBLE1BQUlDLE1BQU0sR0FBR0MsSUFBSSxDQUFDQyxHQUFMLENBQVVMLElBQUksQ0FBQ00sWUFBZixFQUE2Qk4sSUFBSSxDQUFDTyxZQUFsQyxFQUFnRE4sSUFBSSxDQUFDTyxZQUFyRCxFQUFtRVAsSUFBSSxDQUFDSyxZQUF4RSxFQUFzRkwsSUFBSSxDQUFDTSxZQUEzRixDQUFiOztBQUNBLE1BQUtKLE1BQU0sR0FBR0osTUFBTSxDQUFDVSxPQUFsQixHQUE2QnhCLFNBQVMsQ0FBQ3VCLFlBQXZDLEdBQXVEVCxNQUFNLENBQUNXLFdBQVAsR0FBb0IsR0FBOUUsRUFDQTtBQUNJekIsYUFBUyxDQUFDUyxTQUFWLENBQW9CRSxHQUFwQixDQUF3QixNQUF4QjtBQUNILEdBSEQsTUFLQTtBQUNJWCxhQUFTLENBQUNTLFNBQVYsQ0FBb0JDLE1BQXBCLENBQTJCLE1BQTNCO0FBQ0g7QUFDSixDQWJELEU7Ozs7Ozs7Ozs7O0FDckJBLHVDIiwiZmlsZSI6ImFkbWluLmpzIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0ICcuLi9zdHlsZXMvYWRtaW4vYWRtaW4uc2Nzcyc7XG5pbXBvcnQgJy4uL3NjcmlwdHMvYWRtaW4uanMnOyIsImNvbnN0IGl0ZW1zTWVudSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5hZG1pbi0tbWVudSBuYXYgdWwgbGkgYScpXG5jb25zdCBhc2lkZU1lbnUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYWRtaW4tLW1lbnUnKVxuXG5cblxuaXRlbXNNZW51LmZvckVhY2goKGVsZW1lbnQpID0+XG57XG4gICAgZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwoKT0+XG4gICAge1xuICAgICAgICBjb25zb2xlLmxvZyhlbGVtZW50LmRhdGFzZXQubGluaylcblxuICAgICAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYWRtaW4tLW1lbnUgbmF2IHVsIGxpIGEuYWN0aXZlJykuY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJylcbiAgICAgICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKVxuICAgICAgICBsZXQgb2xkSXRlbSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zZWN0aW9uLS1kb2MgLmJsb2NrLS1kb2MgLml0ZW0tLWRvYy5hY3RpdmUnKVxuICAgICAgICBpZihvbGRJdGVtICE9IG51bGwpe29sZEl0ZW0uY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyl9XG4gICAgICAgIGxldCBuZXdFbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihlbGVtZW50LmRhdGFzZXQubGluaylcbiAgICAgICAgY29uc29sZS5sb2cobmV3RWxlbWVudClcbiAgICAgICAgbmV3RWxlbWVudC5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKVxuICAgIH0pXG59KVxuXG53aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywoZWxlbWVudCk9Plxue1xuICAgIGxldCBib2R5ID0gZG9jdW1lbnQuYm9keSxcbiAgICAgICAgaHRtbCA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudDtcbiAgICBsZXQgaGVpZ2h0ID0gTWF0aC5tYXgoIGJvZHkuc2Nyb2xsSGVpZ2h0LCBib2R5Lm9mZnNldEhlaWdodCwgaHRtbC5jbGllbnRIZWlnaHQsIGh0bWwuc2Nyb2xsSGVpZ2h0LCBodG1sLm9mZnNldEhlaWdodCApO1xuICAgIGlmKCgoaGVpZ2h0IC0gd2luZG93LnNjcm9sbFkpKS0gYXNpZGVNZW51LmNsaWVudEhlaWdodCA8ICh3aW5kb3cuaW5uZXJIZWlnaHQgLTE1MCkgKVxuICAgIHtcbiAgICAgICAgYXNpZGVNZW51LmNsYXNzTGlzdC5hZGQoJ2ZpeGUnKVxuICAgIH1cbiAgICBlbHNlXG4gICAge1xuICAgICAgICBhc2lkZU1lbnUuY2xhc3NMaXN0LnJlbW92ZSgnZml4ZScpXG4gICAgfVxufSkiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9