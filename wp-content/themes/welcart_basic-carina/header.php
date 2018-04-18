<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="format-detection" content="telephone=no"/>
<link href="https://fonts.googleapis.com/css?family=Stardos+Stencil" rel="stylesheet">
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	
<div class="site">
	<header id="masthead" class="site-header<?php if( is_front_page() || is_home() ) echo ' home'; ?>">

		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php 
				$logo = wcct_get_options( 'logo' );
				if( empty( $logo ) ):
					bloginfo( 'name' );
				else:
				?>
					<img src="<?php wcct_options( 'logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php
				endif;
				?>	
			</a>
		</<?php echo $heading_tag; ?>>

		<?php if( !welcart_basic_is_cart_page() ): ?>
		
			<?php if( !defined( 'WCEX_WIDGET_CART' ) ): ?>
				<div class="incart-btn"><a href="<?php echo USCES_CART_URL; ?>"><i class="fa fa-shopping-cart"></i><span class="total-quant" id="widgetcart-total-quant"><?php usces_totalquantity_in_cart(); ?></span></a></div>
			<?php else: ?>
				<div class="incart-btn"><i class="fa fa-shopping-cart widget-cart"></i><span class="total-quant" id="widgetcart-total-quant"><?php usces_totalquantity_in_cart(); ?></span></div>
				<div class="view-cart">
					<div class="widgetcart-close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
					<?php if( usces_is_login() && usces_is_membersystem_point() ): ?>
					<div id="wgct_point"><span class="wgct_point_label"><?php _e('Your member points', 'widgetcart'); ?></span> : <span class="wgct_point"><?php usces_memberinfo( 'point' ); ?></span>pt</div>
					<?php endif; ?>
					<div id="wgct_row"><?php echo widgetcart_get_cart_row(); ?></div>
				</div><!-- .view-cart -->
				<div id="wgct_alert"></div>
			<?php endif; ?>

			<div class="menu-bar"><p class="menu-trigger"><span></span><span></span><span></span></p></div>
	
			<div id="mobile-menu">
				<div class="snav">
					<div class="search-box">
						<i class="fa fa-search"></i>
						<?php 
						if(function_exists('get_head_search_form')) {
							get_head_search_form();
						}else {
							get_search_form();
						}
						?>
					</div>
		
					<?php if(usces_is_membersystem_state()): ?>
					<div class="membership">
						<i class="fa fa-user"></i>
						<ul class="cf">
							<?php if( usces_is_login() ): ?>
								<li><?php printf(__('Hello %s', 'usces'), usces_the_member_name('return')); ?></li>
								<li><?php usces_loginout(); ?></li>
								<li><a href="<?php echo USCES_MEMBER_URL; ?>"><?php _e( 'My page', 'welcart_basic' ) ?></a></li>
							<?php else: ?>
								<li><?php _e( 'guest', 'usces' ); ?></li>
								<li><?php usces_loginout(); ?></li>
								<li><a href="<?php echo USCES_NEWMEMBER_URL; ?>"><?php _e( 'New Membership Registration', 'usces' ) ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div><!-- .sub-nav -->
	
				<?php if( wcct_get_options( 'facebook_button' ) || wcct_get_options( 'twitter_button' ) || wcct_get_options( 'instagram_button' ) ): ?>
				<div class="sns-wrapper">
				<ul class="sns cf">
					<?php if( wcct_get_options( 'facebook_button' ) ): ?>
					<li class="fb"><a href="https://www.facebook.com/<?php wcct_options( 'facebook_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
					<?php endif;
						   if( wcct_get_options( 'twitter_button' ) ): ?>
					<li class="twitter"><a href="https://twitter.com/<?php wcct_options( 'twitter_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
					<?php endif;
						   if( wcct_get_options( 'instagram_button' ) ): ?>
					<li class="insta"><a href="https://www.instagram.com/<?php wcct_options( 'instagram_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
				</ul><!-- sns -->
				</div><!-- sns-wrapper -->
				<?php endif; ?>
	
				<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php 
				$page_c	 = get_page_by_path( 'usces-cart' );
				$page_m	 = get_page_by_path( 'usces-member' );
				$nav_arg = array(
					'theme_location'  => 'header',
					'container_class' => 'nav-menu-open',
					'exclude'         => "{$page_c->ID},{$page_m->ID}",
					'menu_class'      => 'header-nav-container cf'
				);
				wp_nav_menu( $nav_arg );
				?>
				</nav><!-- #site-navigation -->
			</div><!-- #mobile-menu -->
		<?php endif; ?>
	</header><!-- #masthead -->

	<?php
	if( is_home() || is_front_page() ):
		if( get_header_image() ):
			$allheaderimg = get_uploaded_header_images();
			if( count( $allheaderimg ) >= 1 ): 
	?>
		<div class="main-image grid-item main">
			<div class="inner slider main-slider">
				<?php foreach ( $allheaderimg as $key => $value ): ?>
				<div><img src="<?php echo $value['url']; ?>" /></div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php else: ?>
		<div class="main-image grid-item main">
			<div class="inner">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
		</div><!-- main-image -->
	<?php
			endif;
		endif;
	endif;
	?>
	
	<?php
	if( is_front_page() || is_home() || is_404() || welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) {
		$main_class = ' one-column';
	} else {
		$main_class = ' two-column ' . wcct_get_options( 'sidebar' );
	}
	?>
	<div id="main" class="wrapper<?php echo $main_class; ?>">