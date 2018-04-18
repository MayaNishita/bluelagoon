// JavaScript Document
jQuery(function($) {
  jQuery('#slides').append('<ul id="pager"><li><a href="#" class="prev"><</a></li><li><a href="#" class="next">></a></li></ul>');
  var jQuerypager = jQuery('#pager'),
      jQueryslidesWrap = jQuery('#slides'),
      jQueryslides = jQuery('#slides-inner'),
      jQueryslideKiji = jQueryslides.find('.slidekiji'),
      jQuerynav = jQuery('#slides-nav'),
      current = 0,
      number = jQueryslideKiji.length;
 
  jQueryslideKiji.each(function(i) {
      jQuery(this).css({
          left: '100' * i + '%'
      });
      jQuerynav.append('<a href="#"></a>');
  });
 
  function navUpdate() {
      jQuerynav.find('a').removeClass('active');
      jQuerynav.find('a').eq(current).addClass('active');
  }
 
  function slider(index) {
      if (index < 0) {
          index = number - 1;
      }
      if (index > number - 1) {
          index = 0;
      }
      jQueryslides.animate({
          left: '-100' * index + '%'
      });
      current = index;
      navUpdate();
  }
 
  jQuerypager.find('a').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('prev')) {
          slider(current - 1);
      } else {
          slider(current + 1);
      }
  });
 
  jQuerynav.find('a').click(function(event) {
      event.preventDefault();
      var navIndex = jQuery(this).index();
      navUpdate();
      slider(navIndex);
  });
 
  var start;
 
  function timerStart() {
      start = setInterval(function() {
          slider(current + 1);
      }, 4000);
  }
 
  function timerStop() {
      clearInterval(start);
  }
 
  slider(current);
 
  timerStart();
 
  jQueryslideKiji.on({
      mouseover: timerStop,
      mouseout: timerStart
  });
});
