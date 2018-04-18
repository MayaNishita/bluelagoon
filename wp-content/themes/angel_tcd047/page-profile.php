<?php
/*
Template Name:Profile page
*/
__('Profile page', 'tcd-w');
?>
<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="article">

   <?php
        $value1 = get_post_meta($post->ID, 'tcd_user_image', true);
        if(!empty($value1)) { $user_image = wp_get_attachment_image_src($value1, 'size1'); };
        $user_name = get_post_meta($post->ID, 'tcd_user_name', true);
        $twitter = get_post_meta($post->ID, 'tcd_twitter_url', true);
        $facebook = get_post_meta($post->ID, 'tcd_facebook_url', true);
        $insta = get_post_meta($post->ID, 'tcd_insta_url', true);
        $pint = get_post_meta($post->ID, 'tcd_pint_url', true);
        $mail = get_post_meta($post->ID, 'tcd_mail_url', true);
   ?>

   <div id="profile_page_top">
    <?php if($value1) { ?><p class="user_avatar"><img src="<?php echo esc_attr($user_image[0]); ?>" alt="" /></p><?php }; ?>
    <h3 class="user_name"><?php echo esc_html($user_name); ?></h3>
    <?php if($twitter || $facebook || $insta  || $pint || $mail) { ?>
    <ul class="user_sns clearfix">
     <?php if($twitter) { ?><li class="twitter_button"><a href="<?php echo esc_url($twitter); ?>" target="_blank"><span>Twitter</span></a></li><?php }; ?>
     <?php if($facebook) { ?><li class="facebook_button"><a href="<?php echo esc_url($facebook); ?>" target="_blank"><span>Facebook</span></a></li><?php }; ?>
     <?php if($insta) { ?><li class="insta_button"><a href="<?php echo esc_url($insta); ?>" target="_blank"><span>Instagram</span></a></li><?php }; ?>
     <?php if($pint) { ?><li class="pint_button"><a href="<?php echo esc_url($pint); ?>" target="_blank"><span>Pinterest</span></a></li><?php }; ?>
     <?php if($mail) { ?><li class="mail_button"><a href="<?php echo esc_url($mail); ?>" target="_blank"><span>Contact</span></a></li><?php }; ?>
    </ul>
    <?php }; ?>
   </div>

   <div class="post_content clearfix">
    <?php the_content(__('Read more', 'tcd-w')); ?>
    <?php custom_wp_link_pages(); ?>
   </div>

  </article><!-- END #article -->

  <?php
       // show banner
       theme_option_page_banner();
  ?>

  <?php
       // show post list
       theme_option_page_post_list();
  ?>

  <?php endwhile; endif; ?>

 </div><!-- END #left_col -->

 <?php
        if( !wp_is_mobile() || is_no_responsive() ) {
          if(is_active_sidebar('page_widget')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('page_widget'); ?>
 </div>
 <?php
          };
        } else {
          if(is_active_sidebar('page_widget_mobile')) {
 ?>
 <div id="side_col">
  <?php dynamic_sidebar('page_widget_mobile'); ?>
 </div>
 <?php
          };
        };
 ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>