<?php $options = get_desing_plus_option(); ?>
<div id="bread_crumb">

<ul class="clearfix">
 <li class="home"><a href="<?php echo esc_url(home_url('/')); ?>"><span><?php _e('Home', 'tcd-w'); ?></span></a></li>
<?php
     // Archive -----------------------------------------------------------------------------------------------------
     if (is_category()) {
?>
 <li class="last"><?php echo single_cat_title('', false); ?></li>
<?php } elseif(is_tag()) { ?>
 <li class="last"><?php echo single_tag_title('', false); ?></li>
<?php } elseif(is_day()) { ?>
 <li class="last"><?php echo esc_html(get_the_time(__('F jS, Y', 'tcd-w'))); ?></li>
<?php } elseif(is_month()) { ?>
 <li class="last"><?php echo esc_html(get_the_time(__('F, Y', 'tcd-w'))); ?></li>
<?php } elseif(is_year()) { ?>
 <li class="last"><?php echo esc_html(get_the_time(__('Y', 'tcd-w'))); ?></li>
<?php
     } elseif(is_author()) {
       global $wp_query;
       $curauth = $wp_query->get_queried_object();
?>
 <li class="last"><?php echo esc_html($curauth->display_name); ?></li>
<?php } elseif(is_search()) { ?>
 <li class="last"><?php _e("Search Result","tcd-w"); ?></li>
<?php
     // Others -----------------------------------------------------------------------------------------------------
     } elseif(is_404()) {
?>
 <li class="last"><?php _e("Sorry, but you are looking for something that isn't here.","tcd-w"); ?></li>
<?php
      } elseif(is_single()) {
?>
 <li><?php the_category('</li><li>','multiple'); ?></li>
 <li class="last"><?php the_title(); ?></li>
<?php } elseif(is_page()) { ?>
 <li class="last"><?php the_title(); ?></li>
<?php }; ?>
</ul>

</div>