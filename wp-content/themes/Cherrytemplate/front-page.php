<?php
/**
 * The template for displaying index.
 *
 */

get_header(); ?>

<section id="mainimage">
<?php dynamic_sidebar('topslider'); ?>
</section>

<main>
	   <section id="area1" class="clearfix">
        <h2><span>Service</span></h2>
       <?php query_posts( 'category_name=service&posts_per_page=3' ); ?>
       <?php while ( have_posts() ) : the_post(); ?>
        <article class="floatnone view view-first">
                     <div class="view view-first"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium' ); ?></a></div>
                     <div class="mask">
                        <h3><?php echo get_the_title(); ?></h3>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                 </div>
        </article>
        <?php endwhile; ?>
        </section>
        <section id="area2" class="clearfix">
       <?php query_posts( 'category_name=blog&posts_per_page=3' ); ?>
       <?php while ( have_posts() ) : the_post(); ?>
        <article class="floatnone view view-first">
                     <div class="view view-first"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium' ); ?></a></div>
                     <div class="mask">
                        <h3><?php echo get_the_title(); ?></h3>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                 </div>
        </article>
        <?php endwhile; ?>
        </section>
    <div id="page-top" class="page-top">
        <p><a id="move-page-top" class="move-page-top">▲</a></p>
    </div>
  </main>
<?php get_footer(); ?>
