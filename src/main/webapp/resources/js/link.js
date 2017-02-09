/**
 * Created by Jeremiah on 2/9/2017.
 */
$(document).ready(function(){
    $("#customerLink").click(function () {
        $.ajax({
            url: "../customerPage/customerInfo.html",
            success: function (data) {
                $("#display").html(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $("#save").click(function () {
        $.ajax({
            url: "../customerPage/customerInfo.html",
            success: function (data) {
                $("#display").html(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $("#addCustomer").click(function () {
        $.ajax({
            url: "../customerPage/infosection.html",
            success: function (data) {
                $("#display").html(data);
                $("#addCustomer").hide();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $("#addLoan").click(function () {
        $.ajax({
            url: "../customerPage/addloan.html",
            success:function (data) {
                $("#display").html(data);
            },
            error: function (data) {
                console.log(data + error);
            }
        });
    });
});