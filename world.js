$(document).ready(function(){

    function ReqC(){
        var CC=$("#country").val();
        $.ajax("http://localhost/info2180-lab5/world.php",{
            method: 'GET',
            data:{
                country:CC
            }
        }).done(function(resp){
            let I=resp;
            $("#result").html(I);
        }).fail(function(){
            alert("Issue with request")
        });
    }

    $("#lookup").click(function(){
        ReqC();
    });
});