$(document).ready(function(){
    $.ajax({
        url:"hours.php",
        type: "GET",
        success : function (data) {
            console.log(data);
        },
        error : function (data){
            console.log(data);
        }

    });
});