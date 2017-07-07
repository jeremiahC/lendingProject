/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
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
/******/ 	return __webpack_require__(__webpack_require__.s = 174);
/******/ })
/************************************************************************/
/******/ ({

/***/ 119:
/***/ (function(module, exports) {

/**
 * Created by Jeremiah on 6/9/2017.
 */

$(document).ready(function () {

    /*-------------------------
            Customer Page
     -------------------------*/

    var addLoan = $('#addLoan').text();
    var interest = $('#interest').text();
    var customer_id = $('#customer_id').val();

    $('.loan_hide').hide();

    var txt = "";
    $('#interest').click(function () {
        console.log('data');
        $.ajax({
            url: '/customerPage/customer' + customer_id + '/generateIntrst',
            success: function success(data) {
                txt += "<tr>";
                txt += "<td>" + data.date + "</td>";
                txt += "<td>" + data.transaction + "</td>";
                txt += "<td></td>";
                txt += "<td></td>";
                txt += "<td>" + data.interest + "</td>";
                txt += "<td></td>";
                txt += "<td>" + data.balance + "</td>";
                txt += "<td></td>";
                txt += "</tr>";

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                var today = yyyy + '-' + mm + '-' + dd;

                if (data.date === today) {
                    $('#ledger').append(txt);
                }
            },
            error: function error(data) {
                console.log(data);
            }

        });
    });

    var balanceData = [];
    $('.balance').each(function () {
        var balance = $(this).text();
        balanceData.push(balance);
    });
    console.log(balanceData);
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: ['january'],
                data: balanceData,
                hoverBackgroundColor: "#FF6384"
            }],
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        },
        options: {
            animation: {
                animateScale: true
            }
        }
    });
});

/***/ }),

/***/ 174:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(119);


/***/ })

/******/ });