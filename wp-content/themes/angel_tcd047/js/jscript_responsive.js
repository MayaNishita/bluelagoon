jQuery(document).ready(function($){

function mediaQueryClass(width) {

 if (width > 1220) { //PC

   $("html").removeClass("mobile");
   $("html").addClass("pc");

   $(".menu_button").css("display","none");

   $("#global_menu").show();

   $("#global_menu li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
   }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
   });

 } else { //smart phone

   //return top button
   var topBtn = $('#return_top');	
   topBtn.removeClass('active');
   $(window).scroll(function () {
     if ($(this).scrollTop() > 100) {
       topBtn.addClass('active');
     } else {
       topBtn.removeClass('active');
     }
   });

   $("html").removeClass("pc");
   $("html").addClass("mobile");

   $("#global_menu li").off('hover');
   $("#global_menu ul ul").removeAttr('style');

   $(".menu_button").css("display", "block");
   $('.menu_button').off('click');

   $(".menu_button").on('click',function() {
     if($(this).hasClass("active")) {
       $(this).removeClass("active");
       $('#global_menu').hide();
       return false;
     } else {
       $(this).addClass("active");
       $('#global_menu').show();
       return false;
     };
   });

   $(".child_menu_button").remove();
   $('#global_menu li > ul').parent().prepend("<span class='child_menu_button'><span class='icon'></span></span>");
   $("#global_menu .child_menu_button").on('click',function() {
     if($(this).parent().hasClass("open")) {
       $(this).parent().removeClass("open");
       return false;
     } else {
       $(this).parent().addClass("open");
       return false;
     };
   });

   $("#global_menu li.menu-item-has-children a").hover(function(){
     $(this).prev().addClass("active");
   }, function(){
     $(this).prev().removeClass("active");
   });

 };
};

function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

var ww = viewport().width;
var timer = false;

mediaQueryClass(ww);

$(window).bind("resize orientationchange", function() {

  if (timer !== false) {
    clearTimeout(timer);
  }
  timer = setTimeout(function() {
    var ww = viewport().width;
    mediaQueryClass(ww);
  }, 200);

})

});