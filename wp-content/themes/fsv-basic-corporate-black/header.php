<?php
/**
 * The Header template for our theme
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.1
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page">

	<div id="masthead" class="site-header-area" role="banner">

		<div class="component-inner">

			<div id="header-menu-button" class="mmenu-load-button">

				<a href="#site-navigation"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_nav.png" width="32" height="28" alt="Navigation Menu"></a>

			</div>
			<?php

			$options = fsvbasic_get_theme_options();

			if ( !isset( $options[ 'header_logo' ] ) ) { $opHeaderLogo = ''; }
			else { $opHeaderLogo = $options[ 'header_logo' ]; }

			if ( !isset( $options[ 'head_large_text' ] ) ) { $opHeadLargeText = 'TEL:0120-00-0000'; }
			else { $opHeadLargeText = $options[ 'head_large_text' ]; }

			if ( !isset( $options[ 'head_text' ] ) ) { $opHeadText = 'texttexttexttexttext'; }
			else { $opHeadText = $options[ 'head_text' ]; }

			if ( !isset( $options[ 'link_sitemap' ] ) ) { $opLinkMap = 'http://'; }
			else { $opLinkMap = $options[ 'link_sitemap' ]; }

			if ( !isset( $options[ 'link_contact' ] ) ) { $opLinkCont = 'mailto:'; }
			else { $opLinkCont = $options[ 'link_contact' ]; }

			if ( ( $opLinkMap ) && ( $opLinkCont ) ) { $hw_linkclass = 'hw_link2'; }
			elseif ( ! ( $opLinkMap ) && ! ( $opLinkCont ) ) { $hw_linkclass = 'hw_link0'; }
			else { $hw_linkclass = 'hw_link1'; }

			if ( ( $opHeadLargeText == "" ) && ( $opHeadText == "" ) && ( $opLinkMap == "" ) && ( $opLinkCont == "" ) ) : ?>

			<div id="header-title-area" class="header-title-only">

			<?php else: ?>

			<div id="header-title-area" class="header-title-area">

			<?php endif;

				if ( $opHeaderLogo ) : ?>

				<h1 class="site-title-img"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img src="<?php echo $opHeaderLogo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a></h1>

				<?php else : ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>

				<?php endif; ?>

				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

			</div><!-- #header-title-area -->

			<div id="header-widget-area"><?php

				if ( ( $opLinkMap ) || ( $opLinkCont ) ) : ?>

					<p class="<?php echo $hw_linkclass; ?>">
					<?php if ( $opLinkMap ) : ?><a href="<?php echo $opLinkMap; ?>"><span><?php _e( 'Sitemap', 'fsvbasic' ); ?></span></a><?php endif; ?>
					<?php if ( $opLinkCont ) : ?><a href="<?php echo $opLinkCont; ?>"><span><?php _e( 'Contact', 'fsvbasic' ); ?></span></a><?php endif; ?>
					</p>
				<?php endif;

				if ( $opHeadText ) : ?><p class="hw_text"><?php echo $opHeadText; ?></p><?php endif;
				if ( $opHeadLargeText ) : ?><p class="hw_text_large"><?php echo $opHeadLargeText; ?></p><?php endif; ?>

			</div><!-- #header-widget-area -->

		</div><!-- .component-inner -->

	</div><!-- #masthead -->

	<div id="header-nav-area" class="navigation-area">

		<div class="component-inner">

			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'fsvbasic' ); ?>"><?php _e( 'Skip to content', 'fsvbasic' ); ?></a>

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_class' => 'menu' , 'menu_class' => 'menu' ) ); ?>

			</nav><!-- #site-navigation -->

		</div><!-- .component-inner -->

	</div><!-- #header-nav-area -->

	<?php

	if ( is_home() || is_front_page() ) :

		$slide_count = 0;

		for ( $i = 1 ; $i < 6 ; $i++ ) {

			// Slider URL
			if ( !isset( $options{ "slide" . $i . "_url" } ) ) {

				// Default Settings
				${ "opSlide" . $i . "Url" } = '#';

			} else {

				${ "opSlide" . $i . "Url" } =  $options{ "slide" . $i . "_url" };

			}

			if ( ${ "opSlide" . $i . "Url" } ) {

				${ "opSlide" . $i . "Url" } = '<a href="' . ${ "opSlide" . $i . "Url" } . '">' ; 

			}

			// Slider Caption
			if ( !isset( $options{ "slide" . $i . "_cap" } ) ) {

				// Default Settings
				${ "opSlide" . $i . "Cap" } = 'slide' . $i . ' caption';

			} else {

				${ "opSlide" . $i . "Cap" } =  $options{ "slide" . $i . "_cap" };

			}

			// Slider Images
			if ( !isset( $options{ "slide" . $i . "_pic" } ) ) {

				// Default Settings
				${ "opSlide" . $i . "Pic" } = get_template_directory_uri() . '/images/header_00' . $i . '.jpg' ;

			} else {

				${ "opSlide" . $i . "Pic" } =  $options{ "slide" . $i . "_pic" };

			}

			if ( ${ "opSlide" . $i . "Pic" } ) {

				$slide_count++ ;

				if ( ! strstr( ${ "opSlide" . $i . "Pic" } , get_template_directory_uri() ) ) {

					${ "opSlide" . $i . "Pic" } = aq_resize( ${ "opSlide" . $i . "Pic" }, 1200, 300, $crop = true , $single = true, $upscale = true );

				}

				${ "opSlide" . $i . "Pic" } = '<img src="' . ${ "opSlide" . $i . "Pic" } . '" alt="' . ${ "opSlide" . $i . "Cap" } . '">' ;

			}

		}

		if ( $slide_count > 0 ) : ?>

	<div id="header-image" class="header-image-area">

		<div class="component-inner">

			<?php if ( $slide_count == 1 ) : ?><div class="main_slider_one"><?php endif; ?>

			<ul class="main_slider">

			<?php for ( $i = 1 ; $i < 6 ; $i++ ) {

				if ( ${ "opSlide" . $i . "Pic" } ) {

					echo '<li>' . "\n";

					echo ${ "opSlide" . $i . "Url" } . "\n";
					echo ${ "opSlide" . $i . "Pic" } . "\n";
					if ( ${ "opSlide" . $i . "Cap" } ) { echo '<div class="bx-caption"><span>' . ${ "opSlide" . $i . "Cap" } . '</span></div>' . "\n"; }
					if ( ${ "opSlide" . $i . "Url" } ) { echo '</a>' . "\n"; }

					echo '</li>' . "\n\n";

				}

			} ?>

			</ul>

			<?php if ( $slide_count == 1 ) : ?></div><?php endif; ?>

		</div>

	</div><!-- #header-title-area --><?php

		endif;

	endif; // is_home()/is_front_page() ?>
