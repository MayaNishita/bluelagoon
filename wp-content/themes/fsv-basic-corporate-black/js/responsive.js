/**
 * This script is used for making the entire site responsive.
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.1
 */

( function( $ ) {

	var v_position = 786;
	var m_position = 1218;

	$(function(){

		$('.main_slider').bxSlider({
			captions : true,
			startSlide : 0
			//,
			//auto: true,
			//autoControls: true
		});

		var w_normal = window.innerWidth;

		if ( w_normal < v_position ) {

			$( 'nav#site-navigation' ).mmenu();
			window.name = 'window_mnu';

		}

	});

	var r_timer = false;

	$(window).resize(function() {

		if ( r_timer !== false ) {

			clearTimeout( r_timer );

    	}

		r_timer = setTimeout(function() {

			var w_resize = window.innerWidth;

			$(function(){

				if ( w_resize < v_position ) {

					$( 'nav#site-navigation' ).mmenu();
					window.name = 'window_mnu';

				} else {

					if ( window.name != 'window_res' ) {

						window.name = 'window_res';

						// Refresh Window
						if( window == parent ){

							location.reload();

						}

					}

				}

			});

		}, 50);

	});

} )( jQuery );

