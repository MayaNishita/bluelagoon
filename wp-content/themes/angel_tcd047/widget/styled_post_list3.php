<?php

class styled_post_list3_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'styled_post_list3_widget',// ID
      __( 'Styled post list3 (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'styled_post_list3_widget',
        'description' => __('Displays styled post list.', 'tcd-w')
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {

    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $post_num = $instance['post_num'];
    $post_type = $instance['post_type'];
    $show_category = $instance['show_category'];
    $show_date = $instance['show_date'];
    $use_retina = $instance['use_retina'];

    $post_order = $instance['post_order'];
    if($post_order=='date2'){ $order = 'ASC'; } else { $order = 'DESC'; };
    if($post_order=='date1'||$post_order=='date2'){ $post_order = 'date'; };

    // Before widget //
    echo $before_widget;

    // Title of widget //
    if ( $title ) { echo $before_title . $title . $after_title; }

    // Widget output //
    if($post_type == 'recent_post') {
      $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order);
    } else {
      $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order, 'meta_key' => $post_type, 'meta_value' => 'on');
    };

    $options = get_desing_plus_option();
    $pickup_post = new WP_Query($args);

?>
<ol class="styled_post_list3 clearfix">
 <?php
      if ($pickup_post->have_posts()) {
        while ($pickup_post->have_posts()) : $pickup_post->the_post();
          $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
 ?>
 <li>
   <?php if($show_category) { ?><p class="category"><?php echo show_parent_category(); ?></p><?php }; ?>
   <?php if ( has_post_thumbnail()) { ?><a class="image" href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()) { if($use_retina == 1) { the_post_thumbnail('size3'); } else { the_post_thumbnail('size2'); }; } else { ?><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /><?php }; ?></a><?php }; ?>
   <div class="meta">
    <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    <?php if ($show_date || $show_category){ ?>
    <ul class="clearfix">
     <?php if ( $show_date ){ ?><li><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
     <?php echo show_child_category(); ?>
    </ul>
    <?php }; ?>
   </div>
 </li>
 <?php endwhile; wp_reset_query(); } else { ?>
 <li class="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></li>
 <?php }; ?>
</ol>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget


  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['post_num'] = $new_instance['post_num'];
    $instance['post_order'] = $new_instance['post_order'];
    $instance['post_type'] = $new_instance['post_type'];
    $instance['show_category'] = $new_instance['show_category'];
    $instance['show_date'] = $new_instance['show_date'];
    $instance['use_retina'] = $new_instance['use_retina'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'title' => __('Recent post', 'tcd-w'), 'post_num' => 1, 'post_order' => 'date1', 'post_type' => 'recent_post', 'show_category' => '1', 'show_date' => '1' , 'use_retina' => 0);
    $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p>
 <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post type:', 'tcd-w'); ?></label>
 <select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" class="widefat" style="width:100%;">
  <option value="recent_post" <?php selected('recent_post', $instance['post_type']); ?>><?php _e('Recent post', 'tcd-w'); ?></option>
  <option value="recommend_post" <?php selected('recommend_post', $instance['post_type']); ?>><?php _e('Recommend post1', 'tcd-w'); ?></option>
  <option value="recommend_post2" <?php selected('recommend_post2', $instance['post_type']); ?>><?php _e('Recommend post2', 'tcd-w'); ?></option>
 </select>
</p>
<p>
 <label for="<?php echo $this->get_field_id('post_num'); ?>"><?php _e('Number of post:', 'tcd-w'); ?></label>
 <select id="<?php echo $this->get_field_id('post_num'); ?>" name="<?php echo $this->get_field_name('post_num'); ?>" class="widefat" style="width:100%;">
  <option value="1" <?php selected('1', $instance['post_num']); ?>>1</option>
  <option value="2" <?php selected('2', $instance['post_num']); ?>>2</option>
  <option value="3" <?php selected('3', $instance['post_num']); ?>>3</option>
  <option value="4" <?php selected('4', $instance['post_num']); ?>>4</option>
  <option value="5" <?php selected('5', $instance['post_num']); ?>>5</option>
 </select>
</p>
<p>
 <label for="<?php echo $this->get_field_id('post_order'); ?>"><?php _e('Post order:', 'tcd-w'); ?></label>
 <select id="<?php echo $this->get_field_id('post_order'); ?>" name="<?php echo $this->get_field_name('post_order'); ?>" class="widefat" style="width:100%;">
  <option value="date1" <?php selected('date1', $instance['post_order']); ?>><?php _e('Date (DESC)', 'tcd-w'); ?></option>
  <option value="date2" <?php selected('date2', $instance['post_order']); ?>><?php _e('Date (ASC)', 'tcd-w'); ?></option>
  <option value="rand" <?php selected('rand', $instance['post_order']); ?>><?php _e('Random', 'tcd-w'); ?></option>
 </select>
</p>
<p>
 <input id="<?php echo $this->get_field_id('show_category'); ?>" name="<?php echo $this->get_field_name('show_category'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_category'] ); ?> />
 <label for="<?php echo $this->get_field_id('show_category'); ?>"><?php _e('Display category', 'tcd-w'); ?></label>
</p>
<p>
 <input id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_date'] ); ?> />
 <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display date', 'tcd-w'); ?></label>
</p>
<p>
 <input id="<?php echo $this->get_field_id('use_retina'); ?>" name="<?php echo $this->get_field_name('use_retina'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['use_retina'] ); ?> />
 <label for="<?php echo $this->get_field_id('use_retina'); ?>"><?php _e('Display large image for Retina display', 'tcd-w'); ?></label>
</p>
<p><?php _e('Please upload large image for Retina display before you use this option.','tcd-w'); ?></p>
<?php

  } // end function form

} // end class


// End class widget
add_action('widgets_init', create_function('', 'return register_widget("styled_post_list3_widget");'));


?>
