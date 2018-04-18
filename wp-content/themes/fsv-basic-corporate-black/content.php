<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.0
 */
?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post' ); ?>>

				<?php

				if ( ! is_attachment() ) :

					if ( has_post_thumbnail() ) :?>

					<div class="entry-image">

						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php

						$thumbnail_id = get_post_thumbnail_id($post->ID);
						$image_ary = wp_get_attachment_image_src( $thumbnail_id, 'full' );

						$img_src = $image_ary[0]; 
						$img_width = $image_ary[1]; 
						$img_height = $image_ary[2]; 

						if ( ( $img_width >= intval( fsvbasic_img_resize('img_archive_width') ) ) && ( $img_height >= intval( fsvbasic_img_resize('img_archive_height') ) ) ): ?>

						<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), fsvbasic_img_resize('img_archive_width'),  fsvbasic_img_resize('img_archive_height'),  fsvbasic_img_resize('img_archive_crop') ); ?>" alt="<?php echo the_title(); ?>" />

						<?php else : ?>

						<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), fsvbasic_img_resize('img_archive_width'),  fsvbasic_img_resize('img_archive_height'),  fsvbasic_img_resize('img_archive_crop') , $single = true, $upscale = true ); ?>" alt="<?php echo the_title(); ?>" />

						<?php endif; ?></a>

					</div><!-- .entry-image -->

					<?php endif; 

				endif; ?>

					<div class="entry-summary">

						<h2 class="excerpt-title"><?php echo get_the_date(); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<!-- p><?php // the_excerpt(); ?></p -->

					</div><!-- .entry-summary -->

				</article><!-- #post -->
