<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.0
 */

if ( ( ( is_home() || is_front_page() ) &&  ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-8' ) ) ) || ( ( ! is_home() && ! is_front_page() ) && ( is_active_sidebar( 'sidebar-2' ) ) ) ) :
?>

		<div id="tertiary" class="sidebar-right">

		<?php if ( ( is_home() || is_front_page() ) && ( is_active_sidebar( 'sidebar-8' ) ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-8' ); ?>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-2' ); ?>

		<?php endif; ?>

		</div><!-- #tertiary -->

<?php endif; ?>