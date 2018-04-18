( function( $ ) {
$( document ).ready( function() {
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		speed: 150,
		asNavFor: '.slider-for',
		arrows: true,
		dots: false,
		focusOnSelect: true
	});
	$('.main-slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		speed: 800,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		focusOnSelect: false,
	});

	$('.cat-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		speed: 150,
		arrows: true,
		dots: false,
		focusOnSelect: false,
		responsive: [{
			breakpoint: 1000,
			settings: {
				slidesToShow: 2,
			}
		}]
	});
} );
} )( jQuery );