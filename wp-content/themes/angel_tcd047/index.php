<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col">

 <div id="left_col">

  <div id="page_header">

   <?php if (is_category()) { ?>
   <h2 class="headline"><?php echo single_cat_title('', false); ?></h2>
   <?php if(category_description()) { ?>
   <div class="desc">
    <?php echo category_description(); ?>
   </div>
	
   <?php }; ?>

	<?php 
	// 祖先カテゴリーを取得
	$ancestors = get_ancestors( $cat, 'category' );
	if ( $ancestors ) {
		$parent = array_pop( $ancestors );
		echo '<p class="page_header_cat_parent">' . esc_html( get_the_category_by_ID( $parent ) ) . '</p>';
	}
	?>

   <?php } elseif( is_tag() ) { ?>
   <h2 class="headline"><?php echo single_tag_title('', false); ?></h2>
   <?php if(tag_description()) { ?>
   <div class="desc">
    <?php echo tag_description(); ?>
   </div>
   <?php }; ?>

   <?php } elseif (is_search()) { ?>
   <?php if ( have_posts() ) : ?>
   <h2 class="headline"><?php printf(__('Search results for - %s', 'tcd-w'), get_search_query()); ?></h2>
   <?php else: ?>
   <h2 class="headline"><?php _e('Search result','tcd-w'); ?></h2>
   <?php endif; ?>

   <?php } elseif (is_day()) { ?>
   <h2 class="headline"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('F jS, Y', 'tcd-w')))); ?></h2>

   <?php } elseif (is_month()) { ?>
   <h2 class="headline"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('F, Y', 'tcd-w')))); ?></h2>

   <?php } elseif (is_year()) { ?>
   <h2 class="headline"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('Y', 'tcd-w')))); ?></h2>

   <?php } elseif (is_author()) { ?>
   <?php global $wp_query; $curauth = $wp_query->get_queried_object(); //get the author info ?>
   <h2 class="headline"><?php printf(__('Archive for the &#8216; %s &#8217;', 'tcd-w'), esc_html($curauth->display_name) ); ?></h2>

   <?php
         } elseif(is_home()) {
   ?>
   <h2 class="headline"><?php _e('Blog archive','tcd-w'); ?></h2>

   <?php }; ?>

  </div><!-- END #page_header -->

  <div id="archive_post">
   <div class="post_list clearfix" id="ajax_load_post_list">
    <?php
         if ( have_posts() ) :
           $i = 1;
           while ( have_posts() ) : the_post();
             $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
             $no_image3 = wp_get_attachment_image_src( $options['no_image3'], 'full' );
             if($i == 1){
    ?>
    <article class="large_item">
     <?php if ( $options['archive_blog_show_category'] ){ ?><p class="category"><?php if(is_category()) { echo show_parent_category2(); } else { echo show_parent_category(); }; ?></p><?php }; ?>
     <div class="image_area">
      <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
      <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { if($options['archive_blog_use_retina'] == 1) { the_post_thumbnail('size5'); } else { the_post_thumbnail('size4'); }; } else { ?><img src="<?php if(!empty($no_image3)) { echo esc_attr($no_image3[0]); } else { echo bloginfo('template_url') . '/img/common/no_image3.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
     </div>
     <?php if ( $options['archive_blog_show_excerpt'] ){ ?><p class="excerpt"><?php if ( post_password_required( $post ) ) { the_excerpt(); } else { new_excerpt(80); } ?></p><?php }; ?>
     <?php if ( $options['archive_blog_show_date'] || $options['archive_blog_show_category']){ ?>
     <ul class="meta clearfix">
      <?php if ( $options['archive_blog_show_date'] ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
      <?php echo show_child_category(); ?>
     </ul>
     <?php }; ?>
    </article>
    <?php } else { ?>
    <article class="item ajax_item">
     <?php if ( $options['archive_blog_show_category'] ){ ?><p class="category"><?php if(is_category()) { echo show_parent_category2(); } else { echo show_parent_category(); }; ?></p><?php }; ?>
     <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { if($options['archive_blog_use_retina'] == 1) { the_post_thumbnail('size3'); } else { the_post_thumbnail('size2'); }; } else { ?><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
     <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php trim_title(42); ?></a></h4>
     <?php if ( $options['archive_blog_show_excerpt'] ){ ?><p class="excerpt"><?php if ( post_password_required( $post ) ) { the_excerpt(); } else { new_excerpt(80); } ?></p><?php }; ?>
     <?php if ( $options['archive_blog_show_date'] || $options['archive_blog_show_category']){ ?>
     <ul class="meta clearfix">
      <?php if ( $options['archive_blog_show_date'] ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
      <?php echo show_child_category(); ?>
     </ul>
     <?php }; ?>
    </article>
    <?php }; ?>
    <?php
         // banner1 --------------------------------------------
         if($i == 5){
           if(!is_mobile()) {
             if( $options['archive_blog_ad_code1'] || $options['archive_blog_ad_image1']) {
    ?>
    <article class="post_list_banner<?php if($options['archive_blog_ad_no_border1'] == 1) { echo " no_border"; }; ?>">
     <?php
          if ($options['archive_blog_ad_code1']) {
            echo $options['archive_blog_ad_code1'];
          } else {
            $image = wp_get_attachment_image_src( $options['archive_blog_ad_image1'], 'full' );
     ?>
     <a href="<?php echo esc_url( $options['archive_blog_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
     <?php }; ?>
    </article><!-- END .post_list_banner -->
    <?php }; }; }; ?>
    <?php
         // banner2 --------------------------------------------
         if($i == 9){
           if(!is_mobile()) {
             if( $options['archive_blog_ad_code2'] || $options['archive_blog_ad_image2']) {
    ?>
    <article class="post_list_banner<?php if($options['archive_blog_ad_no_border2'] == 1) { echo " no_border"; }; ?>">
     <?php
          if ($options['archive_blog_ad_code2']) {
            echo $options['archive_blog_ad_code2'];
          } else {
            $image = wp_get_attachment_image_src( $options['archive_blog_ad_image2'], 'full' );
     ?>
     <a href="<?php echo esc_url( $options['archive_blog_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
     <?php }; ?>
    </article><!-- END .post_list_banner -->
    <?php }; }; }; ?>
    <?php $i++; endwhile; ?>
    <?php endif; ?>
   </div><!-- .post_list -->
   <?php if (show_posts_nav()) { ?>
   <div id="load_post"><?php next_posts_link( __( 'read more', 'tcd-w' ) ); ?></div>
   <?php }; ?>
  </div><!-- END #archive_post -->

 </div><!-- END #left_col -->

 <?php
      if( !wp_is_mobile() || is_no_responsive() ) {
        if(is_active_sidebar('archive_widget')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('archive_widget'); ?>
 </div>
 <?php
        };
      } else {
        if(is_active_sidebar('archive_widget_mobile')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('archive_widget_mobile'); ?>
 </div>
 <?php }; }; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
