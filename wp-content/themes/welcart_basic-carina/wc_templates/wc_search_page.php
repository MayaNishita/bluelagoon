<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

get_header(); ?>

<div id="primary" class="site-content">

	<?php if( have_posts() ) : have_posts(); the_post(); ?>

	<div id="content" role="main">
	
	<h1 class="page-title"><?php the_title(); ?></h1>
	
	<section class="post" id="<?php echo $post->post_name; ?>">
	
		<?php $uscpaged = ( isset($_REQUEST['paged']) ) ? (int)$_REQUEST['paged'] : 1; ?>
		<script type="text/javascript">
			function usces_nextpage() {
				document.getElementById('usces_paged').value = <?php echo ($uscpaged + 1); ?>;
				document.searchindetail.submit();
			}
			function usces_prepage() {
				document.getElementById('usces_paged').value = <?php echo ($uscpaged - 1); ?>;
				document.searchindetail.submit();
			}
			function newsubmit() {
				document.getElementById('usces_paged').value = 1;
			}
		</script>
	
		<div id="searchbox" class="search-li cat-il type-grid">
	
		<?php
		usces_remove_filter();
		if( isset($_REQUEST['usces_search']) ) :
			$catresult = usces_search_categories(); 
			$search_query = array( 'category__and' => $catresult, 'posts_per_page' => 10, 'paged' => $uscpaged );
			$search_query = apply_filters( 'usces_filter_search_query', $search_query ) ;
			$my_query = new WP_Query( $search_query );
		?>
			<div class="title"><?php _e('Search results', 'usces'); ?>&nbsp;&nbsp;<?php echo number_format($my_query->found_posts); ?><?php _e('cases', 'usces'); ?></div>
	
			<?php
			if( $my_query->have_posts() ) :
				$search_result = apply_filters( 'usces_filter_search_result', NULL, $my_query );
				if( !empty($search_result) ):
					echo $search_result;
				else:
					while( $my_query->have_posts() ) : $my_query->the_post(); usces_the_item();
			?>
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
			<?php
					endwhile;
				endif;
			?>
				<div class="navigation cf">
				<?php if( $uscpaged > 1 ) : ?>
					<a style="float:left; cursor:pointer;" onclick="usces_prepage();"><?php _e('&laquo; Previous article', 'usces'); ?></a>
				<?php endif; ?>
				<?php if( $uscpaged < $my_query->max_num_pages ) : ?>
					<a style="float:right; cursor:pointer;" onclick="usces_nextpage();"><?php _e('Next article &raquo;', 'usces'); ?></a>
				<?php endif; ?>
				</div>
			<?php else : ?>
				<div class="searchitems"><p><?php _e('The article was not found.', 'usces'); ?></p></div>
			<?php endif; ?>
	
		<?php
		endif;
		wp_reset_query();
		?>
	
			<form name="searchindetail" action="<?php echo welcart_basic_get_cart_url(); ?>page=search_item" method="post">
	
				<div class="field">
					<label class="outlabel"><?php _e('Categories: AND Search', 'usces'); ?></label><?php echo usces_categories_checkbox('return'); ?>
				</div>
	
				<div class="send">
					<input name="usces_search_button" class="usces_search_button" type="submit" value="<?php _e('Search', 'usces'); ?>" onclick="newsubmit()" />
					<input name="paged" id="usces_paged" type="hidden" value="<?php esc_attr_e( $uscpaged ); ?>" />
					<input name="usces_search" type="hidden" />
				</div>
				<?php do_action( 'usces_action_search_item_inform' ); ?>
	
			</form>
	
		</div><!-- #searchbox -->
	
	</section><!-- .post -->
	
	</div><!-- #content -->
	
	<?php get_sidebar(); ?>
	
	<?php endif; ?>
</div><!-- #primary -->

<?php get_footer(); ?>
