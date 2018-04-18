<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php /* get_template_part( 'slider' );*/ ?><!--追記オート投稿スライドエリア　slider-->
			<?php dynamic_sidebar('topslider'); ?><!--追記ウィジェットエリア　metaslider-->			
			<?php
			$term_ids = array();
			$target_terms = get_terms( 'category', array( 'child_of' => usces_get_cat_id( 'item' ) ) );
			if( ! empty( $target_terms ) && ! is_wp_error( $target_terms ) ) {
				foreach( $target_terms as $target_term ) {
					$img_url	= get_term_meta( $target_term->term_id, 'wcct-tag-thumbnail-url', true );
					if( ! empty( $img_url ) )
						$term_ids[] = $target_term->term_id;
				}
			}
			if( $term_ids ):
			?>
			<section class="category-area">
				<div class="cf slider cat-slider">
				<?php
				foreach( $term_ids as $term_id ):
					$term       = get_term_by( 'id', $term_id, 'category' );
					$img_bg_url = get_term_meta( $term_id, 'wcct-tag-thumbnail-url', true );
					$img_id     = get_term_meta( $term_id, 'wcct-tag-thumbnail-id', true );
					if( ! empty( $img_id ) ) {
						$img_att    = wp_get_attachment_image_src( $img_id, 'large' );
						$img_bg_url = $img_att[0];
					}
				?>
					<div class="category-img">
						<a href="<?php echo get_category_link( $term_id ); ?>">
						<img src="<?php echo $img_bg_url; ?>">
						<div class="cat-desc-wrap overlay">
							<div class="inner">
								<div class="cat-name"><?php esc_html_e( $term->name ); ?></div>
							</div>
						</div>
						</a>
					</div>
				<?php
				endforeach;
				?>
				</div>
			</section>
			<?php
			endif;
			?>
<!--info移動後ここから-->
				<?php
				if( wcct_get_options( 'display_info' ) ):
					$info_num      = wcct_get_options( 'info_num' );
					$info_cat_slug = wcct_get_options( 'info_cat' );
					$info_cat      = get_term_by( 'slug', $info_cat_slug, 'category' );
				?>
				<section class="info-area cf">
					<h2><?php echo $info_cat->name; ?></h2>
					
					<?php
					$info_args = array(
						'posts_per_page' => $info_num,
						'category_name'  => $info_cat_slug,
					); 
					$info_query = new WP_Query( $info_args );
					if ( $info_query->have_posts() ):
						while ( $info_query->have_posts() ):
							$info_query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>"<?php if( has_post_thumbnail() ) echo ' class="has_thumbnail"'; ?>>
						<?php if( has_post_thumbnail() ): ?>
						<div class="thumb-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 300, 300 ) ); ?></a></div>
						<?php endif; ?>
						<time datetime="<?php the_time('c'); ?>"><?php the_time(__('Y/m/d')) ?></time>
						<div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					</article>
					<?php
						endwhile;
						wp_reset_postdata();
					else:
					?>
					<p class="no-date"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php
					endif;
					?>
				</section>
				<?php
				endif;
				?>
				<!--info移動後ここまで-->
			<?php if ( 'page' == get_option( 'show_on_front' ) ): ?>

				<div class="sof">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
						<h2 class="entry-title"><?php the_title(); ?></h2>
				
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; else: ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
				</div>

			<?php else: ?>

				<?php if ( is_active_sidebar( 'carina-top' ) ): ?>
				<section id="home-widget-top" class="home-widget widget-area">
					<?php dynamic_sidebar( 'carina-top' ); ?>
				</section>
				<?php endif; ?>
			
				<?php if( have_posts() ) : ?>
				<section class="front-il cf">
					<?php if( wcct_get_options( 'home_cat_title' ) ): ?>
						<h2><?php echo get_cat_name( get_query_var( 'cat' ) ); ?></h2>
					<?php endif; ?>
	
					<?php while( have_posts() ) : the_post(); usces_the_item(); ?>
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
				</section><!-- .front-il -->
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'carina-middle' ) ): ?>
				<section id="home-widget-middle" class="home-widget widget-area">
					<?php dynamic_sidebar( 'carina-middle' ); ?>
				</section>
				<?php endif; ?>
			
<!--infoここから上部に移動-->
		
				<?php if( is_active_sidebar( 'carina-bottom' ) ): ?>
				<section id="home-widget-bottom" class="home-widget widget-area">
					<?php dynamic_sidebar( 'carina-bottom' ); ?>
				</section>
				<?php endif; ?>
			
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();