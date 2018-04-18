<?php
/*
Template Name:No sidebar, No page title
*/
__('No sidebar, No page title', 'tcd-w');
?>
<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="article">

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

</div><!-- END #main_col -->

<?php get_footer(); ?>