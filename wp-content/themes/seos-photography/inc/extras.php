<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $seos_photography_classes Classes for the body element.
 * @return array
 */
function seos_photography_body_classes( $seos_photography_classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$seos_photography_classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$seos_photography_classes[] = 'hfeed';
	}

	return $seos_photography_classes;
}
add_filter( 'body_class', 'seos_photography_body_classes' );
