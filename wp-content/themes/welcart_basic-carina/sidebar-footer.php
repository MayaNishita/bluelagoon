<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
?>
<aside id="tertiary" class="widget-area footer-widget" role="complementary">
    <div class="wrapper">
		<div class="columnleft">
		<?php
		if ( ! dynamic_sidebar( 'left-widget-area' ) ):
			$args = array(
				'before_widget' => '<section id="welcart_category-3" class="widget widget_welcart_category">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget_title">',
				'after_title' => '</h3>',
			);
			$Welcart_category =array(
				'title' => __('Item Category','usces'),
				'icon' => 1,
				'cat_slug' => 'itemgenre'
			);
			the_widget( 'Welcart_category', $Welcart_category, $args );	
		endif;
		?>
		</div>
		
		<div class="columncenter">
		<?php if ( ! dynamic_sidebar( 'center-widget-area' ) ):
			$args = array(
				'before_widget' => '<section id="welcart_featured-3" class="widget widget_welcart_featured">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget_title">',
				'after_title' => '</h3>',
			);
			global $wp_filter;
			if( array_key_exists('usces_filter_featured_widget', $wp_filter) ){
				$num = 5;
			}else{
				$num = 2;
			}
			$Welcart_featured =array(
				'title' => __('Items recommended','usces'),
				'icon' => 1,
				'num' => $num
			);
			the_widget( 'Welcart_featured', $Welcart_featured, $args );	
		endif;
		?>
		</div>
		
		<div class="columnright">
		<?php
		if ( ! dynamic_sidebar( 'right-widget-area' ) ):
			$args = array(
				'before_widget' => '<section id="welcart_calendar-3" class="widget widget_welcart_calendar">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget_title">',
				'after_title' => '</h3>',
			);
			$Welcart_calendar =array(
				'title' => __('Business Calendar','usces'),
				'icon' => 1,
			);
			the_widget( 'Welcart_calendar', $Welcart_calendar, $args );
		endif;
		?>
		</div>
	</div><!-- .wrapper -->
</aside><!-- #secondary -->