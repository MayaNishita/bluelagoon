<?php
     $options = get_desing_plus_option();
     get_header();
?>


<div id="main_col">

 <?php
      // Featured post --------------------------------------
      if( $options['show_index_featured_post'] == 1 ) {
 ?>
 <div id="index_featured_post">
  <h3 class="post_list_headline" style="font-size:<?php echo esc_html($options['index_featured_post_headline_font_size']); ?>px;"><?php echo esc_html($options['index_featured_post_headline']); ?></h3>
  <div class="post_list clearfix">
   <?php
        $post_type = $options['index_featured_post_type'];
        $args = array('post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, 'orderby' => 'rand', 'meta_key' => $post_type, 'meta_value' => 'on');
        $blog_list = new WP_Query($args);
        if ($blog_list->have_posts()) { while ($blog_list->have_posts()) : $blog_list->the_post();
          $no_image3 = wp_get_attachment_image_src( $options['no_image3'], 'full' );
   ?>
   <article class="item">
    <?php if ( $options['index_featured_post_show_category'] ){ ?><p class="category"><?php echo show_parent_category(); ?></p><?php }; ?>
    <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { if($options['index_featured_post_use_retina'] == 1) { the_post_thumbnail('size3'); } else { the_post_thumbnail('size2'); }; } else { ?><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
    <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php trim_title(40); ?></a></h4>
    <?php if ( $options['index_featured_post_show_excerpt'] ){ ?><p class="excerpt"><?php if ( post_password_required( $post ) ) { the_excerpt(); } else { new_excerpt(75); } ?></p><?php }; ?>
    <?php if ( $options['index_featured_post_show_date'] || $options['index_featured_post_show_category']){ ?>
    <ul class="meta clearfix">
     <?php if ( $options['index_featured_post_show_date'] ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
     <?php echo show_child_category(); ?>
    </ul>
    <?php }; ?>
   </article>
   <?php endwhile; wp_reset_query(); }; ?>
  </div>
 </div><!-- END #index_featured_post -->
 <?php }; ?>

 <?php if($options['show_footer_slider'] == 1) { ?>
 <div id="footer_slider_wrap" class="clearfix">
  <h3 class="headline"><?php echo esc_html($options['footer_slider_headline']); ?></h3>
  <div id="footer_slider">
   <?php
        $post_num = $options['footer_slider_num'];
        $post_type = $options['footer_slider_post_type'];
        $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => 'rand', 'meta_key' => $post_type, 'meta_value' => 'on');
        $footer_slider = new WP_Query($args);
        if ($footer_slider->have_posts()) {
          while ($footer_slider->have_posts()) : $footer_slider->the_post();
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $footer_slider->ID ), "size1" );
          if(!empty($image)) {
   ?>
   <div class="item">
    <a class="title" href="<?php the_permalink(); ?>"><span><?php if ( wp_is_mobile() ) { echo wp_trim_words( get_the_title(), 20, '...' ); } else { the_title(); } ?></span></a>
    <a class="image" href="<?php the_permalink(); ?>"><img src="<?php echo esc_attr($image[0]); ?>" alt="" /></a>
   </div><!-- END .item -->
   <?php
          };
          endwhile; wp_reset_query();
        };
   ?>
  </div><!-- END #footer_slider -->
 </div><!-- END #footer_slider_wrap -->
 <?php }; ?>

 <div id="left_col">

  <?php
       // recent post --------------------------------------
       if( $options['show_index_blog_list'] == 1 ) {
  ?>
  <div id="index_recent_post">
   <h3 class="post_list_headline" style="font-size:<?php echo esc_html($options['index_blog_headline_font_size']); ?>px;"><?php echo esc_html($options['index_blog_headline']); ?></h3>
   <div class="post_list clearfix" id="ajax_load_post_list">
    <?php
         if ( have_posts() ) :
           $i = 1;
           while ( have_posts() ) : the_post();
             $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
             $no_image3 = wp_get_attachment_image_src( $options['no_image3'], 'full' );
             if($i == 3){
    ?>
    <article class="large_item">
     <?php if ( $options['index_blog_show_category'] ){ ?><p class="category"><?php echo show_parent_category(); ?></p><?php }; ?>
     <div class="image_area">
      <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
      <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { if($options['index_blog_use_retina'] == 1) { the_post_thumbnail('size5'); } else { the_post_thumbnail('size4'); }; } else { ?><img src="<?php if(!empty($no_image3)) { echo esc_attr($no_image3[0]); } else { echo bloginfo('template_url') . '/img/common/no_image3.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
     </div>
     <?php if ( $options['index_blog_show_excerpt'] ){ ?><p class="excerpt"><?php if ( post_password_required( $post ) ) { the_excerpt(); } else { new_excerpt(75); } ?></p><?php }; ?>
     <?php if ( $options['index_blog_show_date'] || $options['index_blog_show_category']){ ?>
     <ul class="meta clearfix">
      <?php if ( $options['index_blog_show_date'] ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
      <?php echo show_child_category(); ?>
     </ul>
     <?php }; ?>
    </article>
    <?php } else { ?>
    <article class="item ajax_item">
     <?php if ( $options['index_blog_show_category'] ){ ?><p class="category"><?php echo show_parent_category(); ?></p><?php }; ?>
     <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { if($options['index_blog_use_retina'] == 1) { the_post_thumbnail('size3'); } else { the_post_thumbnail('size2'); }; } else { ?><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
     <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php trim_title(40); ?></a></h4>
     <?php if ( $options['index_blog_show_excerpt'] ){ ?><p class="excerpt"><?php if ( post_password_required( $post ) ) { the_excerpt(); } else { new_excerpt(75); } ?></p><?php }; ?>
     <?php if ( $options['index_blog_show_date'] || $options['index_blog_show_category']){ ?>
     <ul class="meta clearfix">
      <?php if ( $options['index_blog_show_date'] ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
      <?php echo show_child_category(); ?>
     </ul>
     <?php }; ?>
    </article>
    <?php }; ?>
    <?php
         // banner1 --------------------------------------------
         if($i == 2){
           // if(!is_mobile()) {
             if( $options['index_blog_ad_code1'] || $options['index_blog_ad_image1']) {
    ?>
    <?php // <article class="post_list_banner<?php if($options['index_blog_ad_no_border1'] == 1) { echo " no_border"; }; ?>"> ?>
     <?php
          if ($options['index_blog_ad_code1']) {
            // echo $options['index_blog_ad_code1'];
            echo '<div class="epicad"><ul><li>'.adrotate_group(1).'</li><li>'.adrotate_group(2).'</li></ul></div>';
          } else {
            $image = wp_get_attachment_image_src( $options['index_blog_ad_image1'], 'full' );
     ?>
     <a href="<?php echo esc_url( $options['index_blog_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
     <?php }; ?>
    <!-- /article --><!-- END .post_list_banner -->
    <?php }; }; ?>
    <?php
         // banner2 --------------------------------------------
         if($i == 3){
           // if(!is_mobile()) {
             if( $options['index_blog_ad_code1'] || $options['index_blog_ad_image1']) {
    ?>
    <?php // <article class="post_list_banner<?php if($options['index_blog_ad_no_border2'] == 1) { echo " no_border"; }; ?>"> ?>
     <?php
          if ($options['index_blog_ad_code1']) {
            // echo $options['index_blog_ad_code2'];
            echo '<div class="epicad"><ul><li>'.adrotate_group(3).'</li><li>'.adrotate_group(4).'</li></ul></div>';
          } else {
            $image = wp_get_attachment_image_src( $options['index_blog_ad_image2'], 'full' );
     ?>
     <a href="<?php echo esc_url( $options['index_blog_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
     <?php }; ?>
    <!-- /article --><!-- END .post_list_banner -->
    <?php }; }; ?>
    <?php
         // banner3 --------------------------------------------
         if($i == 7){
           // if(!is_mobile()) {
             if( $options['index_blog_ad_code1'] || $options['index_blog_ad_image1']) {
    ?>
    <?php // <article class="post_list_banner<?php if($options['index_blog_ad_no_border2'] == 1) { echo " no_border"; }; ?>"> ?>
     <?php
          if ($options['index_blog_ad_code1']) {
            // echo $options['index_blog_ad_code2'];
            echo '<div class="epicad"><ul><li>'.adrotate_group(5).'</li><li>'.adrotate_group(6).'</li></ul></div>';
          } else {
            $image = wp_get_attachment_image_src( $options['index_blog_ad_image2'], 'full' );
     ?>
     <a href="<?php echo esc_url( $options['index_blog_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
     <?php }; ?>
    <!-- /article --><!-- END .post_list_banner -->
    <?php }; }; ?>
    <?php $i++; endwhile; ?>
    <?php endif; ?>
   </div><!-- .post_list -->
   <?php if (show_posts_nav()) { ?>
   <div id="load_post"><?php next_posts_link( __( 'read more', 'tcd-w' ) ); ?></div>
   <?php }; ?>
  </div><!-- END #index_recent_post -->
  <?php }; ?>

 </div><!-- END #left_col -->

 <?php
      if( !wp_is_mobile() || is_no_responsive() ) {
        if(is_active_sidebar('index_widget')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('index_widget'); ?>
 </div>
 <?php
        };
      } else {
        if(is_active_sidebar('index_widget_mobile')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('index_widget_mobile'); ?>
 </div>
 <?php }; }; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
