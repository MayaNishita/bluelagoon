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
                        <h3>
                        <?php
                        if(mb_strlen($post->post_title, 'UTF-8')>10){
                            $title= mb_substr($post->post_title, 0, 10, 'UTF-8');
                            echo $title.'……';
                        }else{
                            echo $post->post_title;
                        }
                        ?>
                        </h3>
                        <p>
                            <?php
                            //brだけ残す
                            if(mb_strlen($post->post_content, 'UTF-8')>20){
                                $content= mb_substr(strip_tags($post->post_content, '<br>'), 0, 200, 'UTF-8');
                                echo $content.'……';
                            }else{
                                echo strip_tags($post->post_content, '<br>');
                            }
                            //brとspanを残す
                            if(mb_strlen($post->post_content, 'UTF-8')>20){
                                $content= mb_substr(strip_tags($post->post_content, '<br><span>'), 0, 200, 'UTF-8');
                                echo $content.'……';
                            }else{
                                echo strip_tags($post->post_content, '<br><span>');
                            }
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                 </div>
        </article>
        <?php endwhile; ?>
        </section>
        <section id="area2" class="clearfix">
        <h2><span>Blog</span></h2>
       <?php query_posts( 'category_name=blog&posts_per_page=3' ); ?>
       <?php while ( have_posts() ) : the_post(); ?>
        <article class="floatnone view view-first">
                     <div class="view view-first"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium' ); ?></a></div>
                     <div class="mask">
                        <h3>
                        <?php
                        if(mb_strlen($post->post_title, 'UTF-8')>10){
                            $title= mb_substr($post->post_title, 0, 10, 'UTF-8');
                            echo $title.'……';
                        }else{
                            echo $post->post_title;
                        }
                        ?>
                        </h3>
                        <p>
                            <?php
                            //brだけ残す
                            if(mb_strlen($post->post_content, 'UTF-8')>20){
                                $content= mb_substr(strip_tags($post->post_content, '<br>'), 0, 200, 'UTF-8');
                                echo $content.'……';
                            }else{
                                echo strip_tags($post->post_content, '<br>');
                            }
                            //brとspanを残す
                            if(mb_strlen($post->post_content, 'UTF-8')>20){
                                $content= mb_substr(strip_tags($post->post_content, '<br><span>'), 0, 200, 'UTF-8');
                                echo $content.'……';
                            }else{
                                echo strip_tags($post->post_content, '<br><span>');
                            }
                            ?>
                        </p>
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
