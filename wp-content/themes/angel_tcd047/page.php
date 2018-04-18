<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="article">
<p>aaaaaaa</p>
<p>aaaaaaa</p>

   <div id="post_title_area">
    <h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>
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
