<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="article">

   <?php if($options['show_thumbnail'] || $options['show_category']) { ?>
   <div id="post_header"<?php if(!has_post_thumbnail()) { echo ' class="no_thumbnail"'; }; ?>>
    <?php if($options['show_thumbnail'] && has_post_thumbnail()) { ?>
    <div id="post_image">
     <?php the_post_thumbnail('size4'); ?>
    </div>
    <?php }; ?>
    <?php if ( $options['show_category'] ){ ?>
    <p class="category"><?php show_parent_category(); ?></p>
    <?php }; ?>
   </div>
   <?php }; ?>

   <div id="post_title_area">
    <h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>
    <?php if ( $options['show_date'] || $options['show_category']){ ?>
    <ul class="meta clearfix">
     <?php if ( $options['show_date'] ){ ?><li class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
     <?php if ( $options['show_category'] ){ echo show_child_category(); }; ?>
    </ul>
    <?php }; ?>
   </div>

   <?php if($page == '1') { ?>

   <?php if($options['show_sns_top']) { ?>
   <div class="single_share clearfix" id="single_share_top">
    <?php get_template_part('sns-btn-top'); ?>
   </div>
   <?php };?>

   <?php
        // banner1 ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['single_ad_code1'] || $options['single_ad_image1'] || $options['single_ad_code2'] || $options['single_ad_image2'] ) {
   ?>
   <div id="single_banner_area_top" class="single_banner_area clearfix<?php if( !$options['single_ad_code2'] && !$options['single_ad_image2'] ) { echo ' one_banner'; }; ?>">
    <?php if ($options['single_ad_code1']) { ?>
    <div class="single_banner single_banner_left">
     <?php echo $options['single_ad_code1']; ?>
    </div>
    <?php } else { ?>
    <?php $single_image1 = wp_get_attachment_image_src( $options['single_ad_image1'], 'full' ); ?>
    <div class="single_banner single_banner_left">
     <a href="<?php echo esc_url( $options['single_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image1[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
    <?php if ($options['single_ad_code2']) { ?>
    <div class="single_banner single_banner_right">
     <?php echo $options['single_ad_code2']; ?>
    </div>
    <?php } else { ?>
    <?php $single_image2 = wp_get_attachment_image_src( $options['single_ad_image2'], 'full' ); ?>
    <div class="single_banner single_banner_right">
     <a href="<?php echo esc_url( $options['single_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image2[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area -->
   <?php }; ?>
   <?php } else { // if is mobile device ?>
   <?php if( $options['single_mobile_ad_code1'] || $options['single_mobile_ad_image1'] ) { ?>
   <div id="single_banner_area" class="clearfix one_banner">
    <?php if ($options['single_mobile_ad_code1']) { ?>
    <div class="single_banner single_banner_left">
     <?php echo $options['single_mobile_ad_code1']; ?>
    </div>
    <?php } else { ?>
    <?php $single_mobile_image = wp_get_attachment_image_src( $options['single_mobile_ad_image1'], 'full' ); ?>
    <div class="single_banner single_banner_left">
     <a href="<?php echo esc_url( $options['single_mobile_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_mobile_image[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area -->
   <?php
          }; // end mobile banner
        };
   ?>

   <?php }; // if page 1 ?>

   <div class="post_content clearfix">
    <?php the_content(__('Read more', 'tcd-w')); ?>
    <?php custom_wp_link_pages(); ?>
   </div>

   <?php if($options['show_sns_btm']) { ?>
   <div class="single_share clearfix" id="single_share_bottom">
    <?php get_template_part('sns-btn-btm'); ?>
   </div>
   <?php }; ?>

   <?php if ($options['show_author'] || $options['show_category'] || $options['show_tag'] || $options['show_comment']) { ?>
   <ul id="post_meta_bottom" class="clearfix">
    <?php if ($options['show_author']) : ?><li class="post_author"><?php _e("Author","tcd-w"); ?>: <?php if (function_exists('coauthors_posts_links')) { coauthors_posts_links(', ',', ','','',true); } else { the_author_posts_link(); }; ?></li><?php endif; ?>
    <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    <?php if ($options['show_tag']): ?><?php the_tags('<li class="post_tag">',', ','</li>'); ?><?php endif; ?>
    <?php if ($options['show_comment']) : if (comments_open()){ ?><li class="post_comment"><?php _e("Comment","tcd-w"); ?>: <a href="#comment_headline"><?php comments_number( '0','1','%' ); ?></a></li><?php }; endif; ?>
   </ul>
   <?php }; ?>

   <?php if ($options['show_next_post']) : ?>
   <div id="previous_next_post" class="clearfix">
    <?php next_prev_post_link(); ?>
   </div>
   <?php endif; ?>

  </article><!-- END #article -->

   <?php
        // banner 2 -----------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['single_ad_code5'] || $options['single_ad_image5'] ) {
   ?>
   <div id="single_banner_area_bottom"<?php if ($options['single_ad_no_border5']){ echo ' class="no_border"'; }; ?>>
    <?php if ($options['single_ad_code5']) { ?>
    <div class="single_banner">
     <?php echo $options['single_ad_code5']; ?>
    </div>
    <?php } else { ?>
    <?php $single_image5 = wp_get_attachment_image_src( $options['single_ad_image5'], 'full' ); ?>
    <div class="single_banner">
     <a href="<?php echo esc_url( $options['single_ad_url5'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image5[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area_bottom -->
   <?php }; ?>
   <?php } else { // if is mobile device ?>
   <?php if( $options['single_mobile_ad_code2'] || $options['single_mobile_ad_image2'] ) { ?>
   <div id="single_banner_area_bottom" class="clearfix one_banner">
    <?php if ($options['single_mobile_ad_code2']) { ?>
    <div class="single_banner single_banner_left">
     <?php echo $options['single_mobile_ad_code2']; ?>
    </div>
    <?php } else { ?>
    <?php $single_mobile_image2 = wp_get_attachment_image_src( $options['single_mobile_ad_image2'], 'full' ); ?>
    <div class="single_banner single_banner_left">
     <a href="<?php echo esc_url( $options['single_mobile_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_mobile_image2[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area -->
   <?php
          }; // end mobile banner
        };
   ?>

  <?php endwhile; endif; ?>

<?php echo '<div class="epicad"><ul><li>'.adrotate_group(1).'</li><li>'.adrotate_group(2).'</li></ul></div>'; ?>

  <?php
       // related post *******************************************************************************
       if ($options['show_related_post']){
         $categories = get_the_category($post->ID);
         if ($categories) {
           $category_ids = array();
           foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
           $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=> 8, 'orderby' => 'rand');
           $my_query = new wp_query($args);
           if($my_query->have_posts()):
  ?>
  <div id="related_post">
   <h3 class="headline"><span><?php _e("Related post","tcd-w"); ?></span></h3>
   <ol class="clearfix">
    <?php
         while ($my_query->have_posts()): $my_query->the_post();
           $no_image1 = wp_get_attachment_image_src( $options['no_image1'], 'full' );
    ?>
    <li>
     <div class="image_area">
      <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { the_post_thumbnail('size1'); } else { ?><img src="<?php if(!empty($no_image1)) { echo esc_attr($no_image1[0]); } else { echo bloginfo('template_url') . '/img/common/no_image1.gif'; }; ?>" title="" alt="" /><?php }; ?></a>
     </div>
     <h4 class="title"><a href="<?php the_permalink() ?>" name=""><?php trim_title(35); ?></a></h4>
     <?php if ( $options['show_date'] ){ ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></p><?php }; ?>
    </li>
    <?php endwhile; wp_reset_postdata(); ?>
   </ol>
  </div>
  <?php endif; }; ?>
  <?php }; ?>

<?php echo '<div class="epicad" style="margin-top:50px;"><ul><li>'.adrotate_group(7).'</li><li>'.adrotate_group(8).'</li></ul></div>'; ?>

  <?php if ($options['show_comment']) : if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); }; endif; ?>

 </div><!-- END #left_col -->

 <?php
      if( !wp_is_mobile() || is_no_responsive() ) {
        if(is_active_sidebar('single_widget')) {
 ?>
<div id="side_col">
  <?php dynamic_sidebar('single_widget'); ?>
 </div>
 <?php
        };
      } else {
        if(is_active_sidebar('single_widget_mobile')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('single_widget_mobile'); ?>
 </div>
 <?php }; }; ?>


</div><!-- END #main_col -->

<?php get_footer(); ?>
