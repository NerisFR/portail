$(function() {

    $(".subcontent").click(function (){
        alert("Test");
        page=$(this).attr("href");
        $.ajax({
            url : "forms/"+page,
            cache : false,
            success : function(html){
                afficher(html);
                // $('#nav').toggleClass('hide');
                // $('#nav').toggleClass('show');
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
            }
        
        })
        return false;
    })

    function afficher(html){
        $("#content").fadeOut(250,function(){
            $("#content").empty();
            $("#content").append(html);
            $("#content").fadeIn(500);
        })
    };

    

});

    

