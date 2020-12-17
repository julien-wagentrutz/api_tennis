(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["register"],{

/***/ "./assets/imports/register.js":
/*!************************************!*\
  !*** ./assets/imports/register.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_register_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scripts/register.js */ "./assets/scripts/register.js");
/* harmony import */ var _scripts_register_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scripts_register_js__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./assets/scripts/register.js":
/*!************************************!*\
  !*** ./assets/scripts/register.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var inputEmail = document.querySelector('#registration_form_email');
var inputName = document.querySelector('#registration_form_name');
var inputPassword = document.querySelector('#registration_form_plainPassword');
var inputAgree = document.querySelector('#registration_form_agreeTerms');
var inputSubmit = document.querySelector('#register_submit');
inputEmail.addEventListener('input', testInput);
inputName.addEventListener('input', testInput);
inputPassword.addEventListener('input', testInput);
inputAgree.addEventListener('input', testInput);

function testInput() {
  if (inputAgree.checked && inputPassword.value.length > 0 && inputName.value.length > 0 && inputEmail.value.length > 0) {
    inputSubmit.disabled = false;
  } else {
    inputSubmit.disabled = true;
  }
}

/***/ })

},[["./assets/imports/register.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvaW1wb3J0cy9yZWdpc3Rlci5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc2NyaXB0cy9yZWdpc3Rlci5qcyJdLCJuYW1lcyI6WyJpbnB1dEVtYWlsIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiaW5wdXROYW1lIiwiaW5wdXRQYXNzd29yZCIsImlucHV0QWdyZWUiLCJpbnB1dFN1Ym1pdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJ0ZXN0SW5wdXQiLCJjaGVja2VkIiwidmFsdWUiLCJsZW5ndGgiLCJkaXNhYmxlZCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTs7Ozs7Ozs7Ozs7O0FDQUEsSUFBTUEsVUFBVSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsMEJBQXZCLENBQW5CO0FBQ0EsSUFBTUMsU0FBUyxHQUFHRixRQUFRLENBQUNDLGFBQVQsQ0FBdUIseUJBQXZCLENBQWxCO0FBQ0EsSUFBTUUsYUFBYSxHQUFHSCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsa0NBQXZCLENBQXRCO0FBQ0EsSUFBTUcsVUFBVSxHQUFHSixRQUFRLENBQUNDLGFBQVQsQ0FBdUIsK0JBQXZCLENBQW5CO0FBQ0EsSUFBTUksV0FBVyxHQUFHTCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsa0JBQXZCLENBQXBCO0FBR0FGLFVBQVUsQ0FBQ08sZ0JBQVgsQ0FBNEIsT0FBNUIsRUFBcUNDLFNBQXJDO0FBQ0FMLFNBQVMsQ0FBQ0ksZ0JBQVYsQ0FBMkIsT0FBM0IsRUFBb0NDLFNBQXBDO0FBQ0FKLGFBQWEsQ0FBQ0csZ0JBQWQsQ0FBK0IsT0FBL0IsRUFBd0NDLFNBQXhDO0FBQ0FILFVBQVUsQ0FBQ0UsZ0JBQVgsQ0FBNEIsT0FBNUIsRUFBcUNDLFNBQXJDOztBQUdBLFNBQVNBLFNBQVQsR0FBcUI7QUFDakIsTUFDSUgsVUFBVSxDQUFDSSxPQUFYLElBQ0FMLGFBQWEsQ0FBQ00sS0FBZCxDQUFvQkMsTUFBcEIsR0FBNkIsQ0FEN0IsSUFFQVIsU0FBUyxDQUFDTyxLQUFWLENBQWdCQyxNQUFoQixHQUF5QixDQUZ6QixJQUdBWCxVQUFVLENBQUNVLEtBQVgsQ0FBaUJDLE1BQWpCLEdBQTBCLENBSjlCLEVBTUE7QUFDSUwsZUFBVyxDQUFDTSxRQUFaLEdBQXVCLEtBQXZCO0FBQ0gsR0FSRCxNQVVBO0FBQ0lOLGVBQVcsQ0FBQ00sUUFBWixHQUF1QixJQUF2QjtBQUNIO0FBQ0osQyIsImZpbGUiOiJyZWdpc3Rlci5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCAnLi4vc2NyaXB0cy9yZWdpc3Rlci5qcyc7XG4iLCJjb25zdCBpbnB1dEVtYWlsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI3JlZ2lzdHJhdGlvbl9mb3JtX2VtYWlsJylcbmNvbnN0IGlucHV0TmFtZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNyZWdpc3RyYXRpb25fZm9ybV9uYW1lJylcbmNvbnN0IGlucHV0UGFzc3dvcmQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjcmVnaXN0cmF0aW9uX2Zvcm1fcGxhaW5QYXNzd29yZCcpXG5jb25zdCBpbnB1dEFncmVlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI3JlZ2lzdHJhdGlvbl9mb3JtX2FncmVlVGVybXMnKVxuY29uc3QgaW5wdXRTdWJtaXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjcmVnaXN0ZXJfc3VibWl0JylcblxuXG5pbnB1dEVtYWlsLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgdGVzdElucHV0KVxuaW5wdXROYW1lLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgdGVzdElucHV0KVxuaW5wdXRQYXNzd29yZC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIHRlc3RJbnB1dClcbmlucHV0QWdyZWUuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCB0ZXN0SW5wdXQpXG5cblxuZnVuY3Rpb24gdGVzdElucHV0KCkge1xuICAgIGlmKFxuICAgICAgICBpbnB1dEFncmVlLmNoZWNrZWQgJiZcbiAgICAgICAgaW5wdXRQYXNzd29yZC52YWx1ZS5sZW5ndGggPiAwICYmXG4gICAgICAgIGlucHV0TmFtZS52YWx1ZS5sZW5ndGggPiAwICYmXG4gICAgICAgIGlucHV0RW1haWwudmFsdWUubGVuZ3RoID4gMFxuICAgIClcbiAgICB7XG4gICAgICAgIGlucHV0U3VibWl0LmRpc2FibGVkID0gZmFsc2VcbiAgICB9XG4gICAgZWxzZVxuICAgIHtcbiAgICAgICAgaW5wdXRTdWJtaXQuZGlzYWJsZWQgPSB0cnVlXG4gICAgfVxufVxuIl0sInNvdXJjZVJvb3QiOiIifQ==