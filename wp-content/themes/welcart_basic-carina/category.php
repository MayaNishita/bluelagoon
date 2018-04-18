<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
get_header();?>

<div id="primary" class="site-content">

	<div id="content" role="main">
	<?php
	$term_img = $term_class = $term_before = $term_after = '';
	$term_id      = get_query_var( 'cat' );
	$term_img_url = get_term_meta( $term_id, 'wcct-tag-thumbnail-url', true );
	if( !empty( $term_img_url ) ) {
		$term_class .= ' has-catimg';
		$term_img   = '<p class="taxonomy-img"><img src="' . get_term_meta( $term_id, 'wcct-tag-thumbnail-url', true ) . '"></p>';
	}
	if( wcct_get_options( 'cat_image' ) && ! empty( $term_img_url ) ) {
		$term_class  .= ' over';
		$term_before = '<div class="wrap"><div class="inner">';
		$term_after  = '</div></div>';
	}
	?>
	<div class="page-header<?php echo $term_class; ?>">
		<?php
		echo $term_img;
		echo $term_before;
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		echo $term_after;
		?>
	</div><!-- .page-header -->

	<?php if( usces_is_cat_of_item( $term_id ) ): ?>

		<?php if (have_posts()) : ?> 

			<div class="cat-il type-grid">

				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink(); ?>">
						<div class="itemimg">
							<?php usces_the_itemImage( 0, 300, 300 ); ?>
							<?php if( wcct_get_options( 'display_soldout' ) && !usces_have_zaiko_anyone() ): ?>
							<div class="itemsoldout">
								<div class="inner">
									<?php _e( 'SOLD OUT', 'welcart_basic_carina' ); ?>
									<?php if( wcct_get_options( 'display_inquiry' ) ): ?>
									<span class="text"><?php wcct_options( 'display_inquiry_text' ); ?></span>
									<?php endif; ?>
								</div>
							</div>
							<?php endif; ?>
							<?php wcct_produt_tag(); ?>
						</div>
						<div class="item-info-wrap">
						<div class="inner">
							<div class="itemname"><?php usces_the_itemName(); ?></div>
							<div class="itemprice"><?php usces_crform( usces_the_firstPrice('return'), true, false ) . usces_guid_tax(); ?></div>
							<?php welcart_basic_campaign_message(); ?>
						</div>
						</div>
						</a>
					</article>
				<?php endwhile; ?>

			</div><!-- .cat-il -->

		<?php else: ?>
		
			<p class="no-date"><?php echo __('No posts found.', 'usces'); ?></p>

		<?php endif; ?>

	<?php else : ?>

		<?php if (have_posts()) : ?>
		
		<div class="post-li">
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="thumb-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
				<?php endif; ?>
				<div class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'welcart_basic' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></div>
				<div class="entry-meta">
					<span class="date"><time><?php the_date(); ?></time></span>
					<span class="cat"><?php _e("Filed under:"); ?> <?php the_category(',') ?></span>
					<span class="tag"><?php the_tags(__('Tags: ')); ?></span>
					<span class="author"><?php the_author() ?><?php edit_post_link(__('Edit This')); ?></span>
				</div>
				<div class="entry-content">
					<?php the_excerpt() ?>
				</div>
				</article>
			<?php endwhile; ?>
		</div>
		
		<?php else: ?>
		
			<p class="no-date"><?php echo __('No posts found.', 'usces'); ?></p>
		
		<?php endif; ?>

	<?php endif; ?>

		<div class="pagination_wrapper">
			<?php
			$args = array (
				'type' => 'list',
				'prev_text' => __( ' &laquo; ', 'welcart_basic' ),
				'next_text' => __( ' &raquo; ', 'welcart_basic' ),
			);
			echo paginate_links( $args );
			?>
		</div><!-- .pagenation-wrapper -->

	</div><!-- #content -->

	<?php
	if( usces_is_cat_of_item( $term_id ) ) {
		get_sidebar();
	} else {
		get_sidebar( 'other' );
	}
	?>

</div><!-- #primary -->

<?php get_footer(); ?>
