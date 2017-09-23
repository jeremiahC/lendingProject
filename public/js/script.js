/**
 * Created by Jeremiah on 6/9/2017.
 */

$(document).ready(function () {
    //token for form
    var CSRF_TOKEN = $('input[name="_token"]').val();

    /*-------------------------
     Customer Page
     -------------------------*/

    $('.loan_hide').hide();

    $('#int').click(function () {

        var addLoan = $('#addLoan').text();
        var interest = $('#interest').text();
        var customer_id = $('#customer_id').val();

        var txt = "";

        $.ajax({
            url: '/customerPage/customer' + customer_id + '/generateIntrst',
            success: function(data) {
                txt += "<tr>";
                txt += "<td></td>";
                txt += "<td>" + data.transaction + "</td>";
                txt += "<td></td>";
                txt += "<td></td>";
                txt += "<td>" + data.interest + "</td>";
                txt += "<td></td>";
                txt += "<td>" + data.balance + "</td>";
                txt += "<td></td>";
                txt += "</tr>";

                $('#ledger').append(txt);
            },
            error: function(data){
                console.log(data + 'error');
            }

        });
    });

    //delete

    $('.delete').hide();
    $('#delete').click(function () {
        $('.delete').show();
    });

    /*-------------------------
     Investment
     -------------------------*/
    /*TODO
    *
    *   validation for form
    *       - validate if empty
    *
    * */

    /*Withdrawal Form*/
    $('#withdraw-modal').modal();


    $('#widthrawBtn').click(function (e) {
        e.preventDefault();

        var txt = "";
        $.ajax({
            url: '/withdraw',
            type: 'post',
            data:{
                '_token'     : CSRF_TOKEN,
                'balance': $('#invbalance').val(),
                'amount' : $('#invamount').val(),
                'customer_id': $('#customer_id').val()
            },
            success: function (data) {
                console.log(data+'success');
                txt += "<tr>";
                txt += "<td></td>";
                txt += "<td>" + data.transaction + "</td>";
                txt += "<td>" + data.withdraw + "</td>";
                txt += "<td></td>";
                txt += "<td></td>";
                txt += "<td>" + data.balance + "</td>";
                txt += "<td></td>";
                txt += "</tr>";

                $('#invledger').append(txt);
            },
            error: function (data) {
                console.log(data + 'error');
            }
        });
    });

    /*-------------------------
     Chart
     -------------------------*/
    var balanceData = [];
    $('.balance').each(function(){
        var balance = $(this).text();
        balanceData.push(balance);
    });

    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [
                {
                    label: ['january'],
                    data: balanceData,
                    hoverBackgroundColor: "#FF6384",
                }],
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October','November','December']
        },
        options: {
            animation:{
                animateScale:true
            }
        }
    });
});