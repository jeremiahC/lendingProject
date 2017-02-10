/**
 * Created by jeremiah on 2/10/2017.
 */

$("#menu").click(function(e){
    e.preventDefault();
    var distance = $('#content').css('left');
    console.log(distance);

    if(distance == "auto" || distance == "0px") {
        openSidepage();
    } else {
        closeSidepage();
    }

}); // end click event handler


function openSidepage() {
    $('#content').animate({
        left: '350px'
    }, 400, 'easeOutBack');
}

function closeSidepage(){
    $('#content').animate({
        left: '0px'
    }, 400, 'easeOutQuint');
}