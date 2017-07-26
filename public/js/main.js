
function markNotificationRead(){
    $.get('/markAsRead', function(data){
        console.log(data);
    });
}