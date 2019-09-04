$(document).ready(function(){
    //Nav Bar
    $(".nav-button").click(function(){
        console.log("nav-button");
        $(".nav-button").removeClass("active");
        $(this).addClass("active");
    });
    $(".home-button").click(function(){
        console.log(".home-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#home").removeClass("invisible");
    });
    $(".application-button").click(function(){
        console.log(".application-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-application").addClass("active");
        $("#application").removeClass("invisible");
    });
    $(".programs-button").click(function(){
        console.log(".application-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-programs").addClass("active");
        $("#programs").removeClass("invisible");
    });
    function invisible(){
        console.log("invisible");
        var ids=["#home","#application","#programs"];
        for(var i in ids){
            $(ids[i]).addClass("invisible");
        }
    }
});

