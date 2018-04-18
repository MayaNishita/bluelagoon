<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.0
 */

if ( ( ( is_home() || is_front_page() ) &&  ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-7' ) ) ) || ( ( ! is_home() && ! is_front_page() ) && ( is_active_sidebar( 'sidebar-1' ) ) ) ) :
?>

		<div id="secondary" class="sidebar-left">

		<?php if ( ( is_home() || is_front_page() ) && ( is_active_sidebar( 'sidebar-7' ) ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-7' ); ?>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<?php endif; ?>

		</div><!-- #secondary -->

<?php endif; ?>