<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

get_header(); ?>

<div id="primary" class="site-content">

	<div id="content" role="main">

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'welcart_basic' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
		</header><!-- .page-header -->

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

		</div><!-- .search-li -->

		<div class="pagination_wrapper">
			<?php
			$args = array (
				'type' => 'list',
				'prev_text' => __( ' &laquo; ', 'welcart_basic' ),
				'next_text' => __( ' &raquo; ', 'welcart_basic' ),
			);
			echo paginate_links($args);
			?>
		</div><!-- .pagination_wrapper -->
		
		<?php else: ?>

			<p><?php echo __('No posts found.', 'usces'); ?></p>

		<?php endif; ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
