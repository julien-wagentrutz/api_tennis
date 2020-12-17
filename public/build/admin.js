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

  if (height - window.scrollY - 400 < window.innerHeight - 52) {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvaW1wb3J0cy9hZG1pbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc2NyaXB0cy9hZG1pbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FkbWluL2FkbWluLnNjc3MiXSwibmFtZXMiOlsiaXRlbXNNZW51IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiYXNpZGVNZW51IiwicXVlcnlTZWxlY3RvciIsImZvckVhY2giLCJlbGVtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImNvbnNvbGUiLCJsb2ciLCJkYXRhc2V0IiwibGluayIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFkZCIsIm9sZEl0ZW0iLCJuZXdFbGVtZW50Iiwid2luZG93IiwiYm9keSIsImh0bWwiLCJkb2N1bWVudEVsZW1lbnQiLCJoZWlnaHQiLCJNYXRoIiwibWF4Iiwic2Nyb2xsSGVpZ2h0Iiwib2Zmc2V0SGVpZ2h0IiwiY2xpZW50SGVpZ2h0Iiwic2Nyb2xsWSIsImlubmVySGVpZ2h0Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNBQSxJQUFNQSxTQUFTLEdBQUdDLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsMEJBQTFCLENBQWxCO0FBQ0EsSUFBTUMsU0FBUyxHQUFHRixRQUFRLENBQUNHLGFBQVQsQ0FBdUIsY0FBdkIsQ0FBbEI7QUFJQUosU0FBUyxDQUFDSyxPQUFWLENBQWtCLFVBQUNDLE9BQUQsRUFDbEI7QUFDSUEsU0FBTyxDQUFDQyxnQkFBUixDQUF5QixPQUF6QixFQUFpQyxZQUNqQztBQUNJQyxXQUFPLENBQUNDLEdBQVIsQ0FBWUgsT0FBTyxDQUFDSSxPQUFSLENBQWdCQyxJQUE1QjtBQUVBVixZQUFRLENBQUNHLGFBQVQsQ0FBdUIsaUNBQXZCLEVBQTBEUSxTQUExRCxDQUFvRUMsTUFBcEUsQ0FBMkUsUUFBM0U7QUFDQVAsV0FBTyxDQUFDTSxTQUFSLENBQWtCRSxHQUFsQixDQUFzQixRQUF0QjtBQUNBLFFBQUlDLE9BQU8sR0FBR2QsUUFBUSxDQUFDRyxhQUFULENBQXVCLDZDQUF2QixDQUFkOztBQUNBLFFBQUdXLE9BQU8sSUFBSSxJQUFkLEVBQW1CO0FBQUNBLGFBQU8sQ0FBQ0gsU0FBUixDQUFrQkMsTUFBbEIsQ0FBeUIsUUFBekI7QUFBbUM7O0FBQ3ZELFFBQUlHLFVBQVUsR0FBR2YsUUFBUSxDQUFDRyxhQUFULENBQXVCRSxPQUFPLENBQUNJLE9BQVIsQ0FBZ0JDLElBQXZDLENBQWpCO0FBQ0FILFdBQU8sQ0FBQ0MsR0FBUixDQUFZTyxVQUFaO0FBQ0FBLGNBQVUsQ0FBQ0osU0FBWCxDQUFxQkUsR0FBckIsQ0FBeUIsUUFBekI7QUFDSCxHQVhEO0FBWUgsQ0FkRDtBQWdCQUcsTUFBTSxDQUFDVixnQkFBUCxDQUF3QixRQUF4QixFQUFpQyxVQUFDRCxPQUFELEVBQ2pDO0FBQ0ksTUFBSVksSUFBSSxHQUFHakIsUUFBUSxDQUFDaUIsSUFBcEI7QUFBQSxNQUNJQyxJQUFJLEdBQUdsQixRQUFRLENBQUNtQixlQURwQjtBQUVBLE1BQUlDLE1BQU0sR0FBR0MsSUFBSSxDQUFDQyxHQUFMLENBQVVMLElBQUksQ0FBQ00sWUFBZixFQUE2Qk4sSUFBSSxDQUFDTyxZQUFsQyxFQUFnRE4sSUFBSSxDQUFDTyxZQUFyRCxFQUFtRVAsSUFBSSxDQUFDSyxZQUF4RSxFQUFzRkwsSUFBSSxDQUFDTSxZQUEzRixDQUFiOztBQUNBLE1BQUtKLE1BQU0sR0FBR0osTUFBTSxDQUFDVSxPQUFsQixHQUE0QixHQUE1QixHQUFtQ1YsTUFBTSxDQUFDVyxXQUFQLEdBQXFCLEVBQTNELEVBQ0E7QUFDSXpCLGFBQVMsQ0FBQ1MsU0FBVixDQUFvQkUsR0FBcEIsQ0FBd0IsTUFBeEI7QUFDSCxHQUhELE1BS0E7QUFDSVgsYUFBUyxDQUFDUyxTQUFWLENBQW9CQyxNQUFwQixDQUEyQixNQUEzQjtBQUNIO0FBQ0osQ0FiRCxFOzs7Ozs7Ozs7OztBQ3JCQSx1QyIsImZpbGUiOiJhZG1pbi5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCAnLi4vc3R5bGVzL2FkbWluL2FkbWluLnNjc3MnO1xuaW1wb3J0ICcuLi9zY3JpcHRzL2FkbWluLmpzJzsiLCJjb25zdCBpdGVtc01lbnUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuYWRtaW4tLW1lbnUgbmF2IHVsIGxpIGEnKVxuY29uc3QgYXNpZGVNZW51ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFkbWluLS1tZW51JylcblxuXG5cbml0ZW1zTWVudS5mb3JFYWNoKChlbGVtZW50KSA9Plxue1xuICAgIGVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsKCk9PlxuICAgIHtcbiAgICAgICAgY29uc29sZS5sb2coZWxlbWVudC5kYXRhc2V0LmxpbmspXG5cbiAgICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFkbWluLS1tZW51IG5hdiB1bCBsaSBhLmFjdGl2ZScpLmNsYXNzTGlzdC5yZW1vdmUoJ2FjdGl2ZScpXG4gICAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJylcbiAgICAgICAgbGV0IG9sZEl0ZW0gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2VjdGlvbi0tZG9jIC5ibG9jay0tZG9jIC5pdGVtLS1kb2MuYWN0aXZlJylcbiAgICAgICAgaWYob2xkSXRlbSAhPSBudWxsKXtvbGRJdGVtLmNsYXNzTGlzdC5yZW1vdmUoJ2FjdGl2ZScpfVxuICAgICAgICBsZXQgbmV3RWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoZWxlbWVudC5kYXRhc2V0LmxpbmspXG4gICAgICAgIGNvbnNvbGUubG9nKG5ld0VsZW1lbnQpXG4gICAgICAgIG5ld0VsZW1lbnQuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJylcbiAgICB9KVxufSlcblxud2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsKGVsZW1lbnQpPT5cbntcbiAgICBsZXQgYm9keSA9IGRvY3VtZW50LmJvZHksXG4gICAgICAgIGh0bWwgPSBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XG4gICAgbGV0IGhlaWdodCA9IE1hdGgubWF4KCBib2R5LnNjcm9sbEhlaWdodCwgYm9keS5vZmZzZXRIZWlnaHQsIGh0bWwuY2xpZW50SGVpZ2h0LCBodG1sLnNjcm9sbEhlaWdodCwgaHRtbC5vZmZzZXRIZWlnaHQgKTtcbiAgICBpZigoKGhlaWdodCAtIHdpbmRvdy5zY3JvbGxZKSktNDAwIDwgKHdpbmRvdy5pbm5lckhlaWdodCAtIDUyKSApXG4gICAge1xuICAgICAgICBhc2lkZU1lbnUuY2xhc3NMaXN0LmFkZCgnZml4ZScpXG4gICAgfVxuICAgIGVsc2VcbiAgICB7XG4gICAgICAgIGFzaWRlTWVudS5jbGFzc0xpc3QucmVtb3ZlKCdmaXhlJylcbiAgICB9XG59KSIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=