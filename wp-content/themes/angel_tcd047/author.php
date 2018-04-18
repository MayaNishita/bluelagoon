<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>


<div id="main_col">
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
<?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>
</div><!-- END #page_header -->
        <div id="left_col">

         <article id="article">
        <!-- ループ -->

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php endwhile; else: ?>
                <p><?php _e('この作成者の投稿はありません。'); ?></p>
            <?php endif; ?>

        <!-- ループ終了 -->



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
        <div id="archive_post">
            <?php echo '<div class="epicad"><ul><li>'.adrotate_group(1).'</li><li>'.adrotate_group(2).'</li></ul></div>'; ?>
           <div class="post_list clearfix" id="ajax_load_post_list">
            <?php
                 if ( have_posts() ) :
                   $i = 1;
                   while ( have_posts() ) : the_post();
                     $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
                     $no_image3 = wp_get_attachment_image_src( $options['no_image3'], 'full' );
                     if($i == 1){
            ?>

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
