<?php
/*
Template Name:LIFE LOG
*/
?>
<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

  <article id="article">

   <div id="post_title_area">
    <h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>
   </div>

<div class="post_content clearfix">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 	<?php endwhile; endif; ?>
    <?php the_content(__('Read more', 'tcd-w')); ?>
    <?php custom_wp_link_pages(); ?>
<?php $users = get_users( array('orderby'=>ID,'order'=>ASC) ); ?>
<div class="authors clearfix">
  	<?php foreach($users as $user) { $uid = $user->ID; ?>
  	<div class="author-profile">
		<div class="author-thumbanil">
    		<a href="<?php echo get_bloginfo("url") . '/?author=' . $uid ?>">
			<?php echo get_avatar( $uid ,300 ); ?></a>
 		</div>
		<div class="author-link">
			<a href="<?php echo get_bloginfo("url") . '/?author=' . $uid ?>">
    		<?php echo $user->display_name ; ?>の記事</a>
		</div>
	</div>
   <?php } ?>
</div>
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

</div><!-- END #main_col -->

<?php get_footer(); ?>
