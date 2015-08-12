$(document).ready(function () {
    bannerChange();
});

function bannerChange(){
    $("#nav li").mouseover(function () {
        $(this).removeClass("textColor2");
        $(this).addClass("onHoverColor textColor1");
        $(this).children(".pageBox1").removeClass("disappear");
        $(this).children(".pageBox2").removeClass("disappear");
        $(this).children(".pageBox1").addClass("appear");
        $(this).children(".pageBox2").addClass("appear");
        
    });
    $("#nav li").mouseout(function () {
        $(this).removeClass("onHoverColor");
        $(this).addClass("textColor2");
        $(this).children(".pageBox1").removeClass("appear");
        $(this).children(".pageBox2").removeClass("appear");
        $(this).children(".pageBox1").addClass("disappear");
        $(this).children(".pageBox2").addClass("disappear");
        
    });
}

$(function(){
    $(".teacher_info p").each(function(i){
        $clamp(this, {clamp: 4});
    });
});