<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.0
 */
?>

<?php get_header(); ?>

	<div id="main" class="main-content-area">

		<div class="component-inner">

			<div id="wrapbox" class="main-content-wrap">

				<div id="primary" class="main-content-site" role="main">

					<?php fsvbasic_breadcrumb() ; ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'individual-post' ); ?>>

						<header class="main-content-header">

							<h2 class="main-content-title"><?php the_title(); ?></h2>

							<div class="entry-meta">

								<?php fsvbasic_entry_meta(); ?>

								<?php if ( is_user_logged_in() ) : ?><?php edit_post_link( __( 'Edit', 'fsvbasic' ), '<p class="post-edit-link-base">', '</p>' ); ?></p><?php endif; ?>

							</div><!-- .entry-meta -->

						</header><!-- .main-content-header -->

						<div class="entry-content">

							<?php if ( has_post_thumbnail() ) : ?>

							<div class="attachment">

								<?php

								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$image_ary = wp_get_attachment_image_src( $thumbnail_id, 'full' );

								$img_src = $image_ary[0]; 
								$img_width = $image_ary[1]; 
								$img_height = $image_ary[2]; 

								if ( ( $img_width < intval( fsvbasic_img_resize('img_post_width') ) ) || ( $img_height < intval( fsvbasic_img_resize('img_post_height') ) ) ) :

									the_post_thumbnail();

								else : ?>

								<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), fsvbasic_img_resize('img_post_width'),  fsvbasic_img_resize('img_post_height'),  fsvbasic_img_resize('img_post_crop') ); ?>" alt="<?php echo the_title(); ?>" />

								<?php endif; ?>

							</div><!-- .attachment -->

							<?php endif; ?>

							<?php the_content(); ?>

							<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

						</div><!-- .entry-content -->

						<div class="clear"></div>

						<nav class="nav-single">

							<div class="nav-previous">

							<?php if ( get_adjacent_post( false , '' , true ) ) : ?>

								<?php previous_post_link( '%link' , __( 'Previous Post', 'fsvbasic' ) ); ?>

							<?php else: ?>

								<?php echo '<a name="no-pager-links" class="no-pager-links">&nbsp;</a>'; ?>

							<?php endif; ?>

							</div>

							<div class="nav-next">

							<?php if ( get_adjacent_post( false , '' , false ) ) : ?>

								<?php next_post_link( '%link' , __( 'Next Post', 'fsvbasic' ) ); ?>

							<?php else: ?>

								<?php echo '<a name="no-pager-links" class="no-pager-links">&nbsp;</a>'; ?>

							<?php endif; ?>

							</div>

						</nav><!-- .nav-single -->

					</article><!-- #post -->

					<?php endwhile; // end of the loop. ?>

					<?php comments_template( '', true ); ?>

				</div><!-- #primary -->

				<?php get_sidebar( 'left' ); ?>

			</div>

			<?php get_sidebar( 'right' ); ?>

		</div>

	</div><!-- #main -->

<?php get_sidebar( 'footer' ); ?>

<?php get_footer(); ?>
