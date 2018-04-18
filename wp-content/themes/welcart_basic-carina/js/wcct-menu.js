( function( $ ) {
	
	$( document ).ready( function() {
		var windowWidth = window.innerWidth;
		if ( windowWidth <= 1000 ) {
			$('#mobile-menu,.view-cart').css('height', $('body').height() + 'px');
			$('.menu-trigger').click(function(){
				$('.site').toggleClass('menu-on');
			});
		} else {
			$('.site').removeClass('menu-on');
			$('.view-cart').css('height', '');
		}
		if( $('.incart-btn i.widget-cart').length ){
			$('.incart-btn i.widget-cart').click(function(){
				$('.site').addClass('widgetcart-on');
			});
			$('.widgetcart-close-btn i').click(function(){
				$('.site').removeClass('widgetcart-on');
			});
		}
		if( $('.tab-list').length ){
			$('.tab-list li:first,.tab-box:first').addClass('select');
			$('.tab-list li').click(function() {
				var num = $('.tab-list li').index(this);
				$('.tab-list li,.tab-box').removeClass('select');
				$(this).addClass('select');
				$('.tab-box').eq(num).addClass('select');
			});
		}
	} );
	
} )( jQuery );