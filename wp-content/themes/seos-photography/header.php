<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'seos-photography' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'seos-photography' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
				
		<?php if ( (is_front_page() or is_home()) and !get_theme_mod('hide_home_image') ) : ?>
		
				<?php if ( !get_theme_mod('hide_home_image')) : ?>

					<?php if(get_theme_mod('front_page_image') ) : ?>
					
						<div class="site-branding" style="background-image: url('<?php echo get_theme_mod('front_page_image');  ?>'); min-height: 850px">
				
					<?php else : ?>
			
						<div class="site-branding" style="background-image: url('<?php echo get_template_directory_uri() . '/images/header.jpg';  ?>'); min-height: 850px">
			
					<?php endif;  ?>

						<?php sp_header_image (); ?>
						
			<?php endif; ?>	
			
						</div><!-- .site-branding -->
		
		<?php else : ?>

			<?php sp_title_and_description(); ?>
				
		<?php endif; ?>
	
	</header><!-- #masthead -->
	
	<div class="clear"></div>
	
		<?php if ( is_front_page() or is_home() ) { ?>
			
			<div class="container-images">
			
			<?php if (!get_theme_mod('hide_img_1')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title">My Photography</div>
							<div class="sp-description">Photography Description</div>
							<img src="<?php echo get_template_directory_uri() .'/images/header.jpg'; ?>" alt="img-1" />
						</div>
					</a>				
			<?php else : ?>
			
			<?php if(get_theme_mod('seos_photography_img1') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('seos_photography_url1')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_attr(get_theme_mod('seos_photography_title1')); ?></div>
							<div class="sp-description"><?php echo esc_attr(get_theme_mod('seos_photography_text1')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('seos_photography_img1')); ?>" alt="img-1" />
						</div>
					</a>				
			<?php endif; endif; ?>

			<?php if (!get_theme_mod('hide_img_2')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title">My Photography</div>
							<div class="sp-description">Photography Description</div>
							<img src="<?php echo get_template_directory_uri() .'/images/header.jpg'; ?>" alt="img-2" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('seos_photography_img2') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('seos_photography_url2')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_attr(get_theme_mod('seos_photography_title2')); ?></div>
							<div class="sp-description"><?php echo esc_attr(get_theme_mod('seos_photography_text2')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('seos_photography_img2')); ?>" alt="img-2" />
						</div>
					</a>				
			<?php endif; endif; ?>

			<?php if (!get_theme_mod('hide_img_3')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title">My Photography</div>
							<div class="sp-description">Photography Description</div>
							<img src="<?php echo get_template_directory_uri() .'/images/header.jpg'; ?>" alt="img-3" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('seos_photography_img3') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('seos_photography_url3')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_attr(get_theme_mod('seos_photography_title3')); ?></div>
							<div class="sp-description"><?php echo esc_attr(get_theme_mod('seos_photography_text3')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('seos_photography_img3')); ?>" alt="img-3" />
						</div>
					</a>				
			<?php endif; endif; ?>
				
			</div><!-- .container-images -->
			
		<?php } ?>	

	<div id="content" class="site-content">
