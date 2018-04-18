jQuery(document).ready(function($){

  $("a").bind("focus",function(){if(this.blur)this.blur();});
  $("a.target_blank").attr("target","_blank");

  //return top button
	var topBtn = $('#return_top');	

  $('#return_top a').click(function() {
    var myHref= $(this).attr("href");
    var myPos = $(myHref).offset().top;
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });

	topBtn.removeClass('active');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			topBtn.addClass('active');
		} else {
			topBtn.removeClass('active');
		}
	});

  //category widget
  $(".tcd_category_list li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
  }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
  });

  //tab post list widget
	$('.widget_tab_post_list_button').on('click', 'a.tab1', function(){
    $(this).parents('.widget_tab_post_list_button').children('a.tab2').removeClass('active');
    $(this).addClass('active');
    $(this).parents('.widget_tab_post_list_button').next().show();
    $(this).parents('.widget_tab_post_list_button').next().next().hide();
		return false;
	});
	$('.widget_tab_post_list_button').on('click', 'a.tab2', function(){
    $(this).parents('.widget_tab_post_list_button').children('a.tab1').removeClass('active');
    $(this).addClass('active');
    $(this).parents('.widget_tab_post_list_button').next().hide();
    $(this).parents('.widget_tab_post_list_button').next().next().show();
		return false;
	});

  //comment tab
  $("#trackback_switch").click(function(){
    $("#comment_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#comment_area").animate({opacity: 'hide'}, 0);
    $("#trackback_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  $("#comment_switch").click(function(){
    $("#trackback_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#trackback_area").animate({opacity: 'hide'}, 0);
    $("#comment_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  //global menu
  $("#global_menu li").hover(function(){
    $(">ul:not(:animated)",this).slideDown("fast");
    $(this).addClass("active");
  }, function(){
    $(">ul",this).slideUp("fast");
    $(this).removeClass("active");
  });

});