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
        $.ajax({
            url: '/customerPage/customer' + customer_id + '/generateIntrst',
            success: function(data) {
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
                var mm = today.getMonth()+1; //January is 0!

                var yyyy = today.getFullYear();
                if(dd<10){
                    dd='0'+dd;
                }
                if(mm<10){
                    mm='0'+mm;
                }

                var today = yyyy+'-'+mm+'-'+dd;

                if(data.date === today) {
                    $('#ledger').append(txt);
                }
            },
            error: function(data){
                console.log(data);
            }

        });
    });


    var balanceData = [];
    $('.balance').each(function(){
        var balance = $(this).text();
        balanceData.push(balance);
    });
    console.log(balanceData);
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