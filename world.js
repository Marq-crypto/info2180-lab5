$(document).ready(function(){

    function ReqC(city=""){
        var CC=$("#country").val();
        $.ajax("world.php",{
            method: 'GET',
            data:{
                country:CC,
                context:city
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

    $("#lookup-cities").click(function(){
        ReqC("cities");
    });

    
});