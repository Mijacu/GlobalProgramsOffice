$(document).ready(function(){
    console.log("Java Script");
    //Sign up and Sign in
    $("#sign_up").click(function(){
        console.log("sign_up");
        $("#id01").css("display","block");
        $(".container-row").css("display","none");
    });
    $("#sign_in").click(function(){
        console.log("sign_in");
        $("#id02").css("display","flex");
        $(".container-row").css("display","none");
    });
    //Nav Bar
    $(".nav-button").click(function(){
        console.log("nav-button");
        $(".nav-button").removeClass("active");
        $(this).addClass("active");
    });
    //Aside Bar
    $(".home-button").click(function(){
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#home").removeClass("invisible");
    });
    $(".people-button").click(function(){
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-people").addClass("active");
        $("#people").removeClass("invisible");
    });
    $(".DDP-button").click(function(){
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#DDP").removeClass("invisible");
    });
    $(".FLP-button").click(function(){
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#FLP").removeClass("invisible");
    });
    $(".RAP-button").click(function(){
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#RAP").removeClass("invisible");
    });
    function invisible(){
        console.log("invisible");
        var ids=["#home","#people","#DDP","#FLP","#RAP"];
        for(var i in ids){
            $(ids[i]).addClass("invisible");
        }
    }
});
