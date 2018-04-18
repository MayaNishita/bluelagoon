<?php

class tcd_archive_dropdown extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcd_archive_dropdown',// ID
      __( 'Archive dropdown menu (tcd-w ver)', 'tcd-w' ),
      array(
        'classname' => 'tcd_archive_dropdown',
        'description' => __('Displays monthly archive dropdown menu.', 'tcd-w')
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {

    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);

    // Before widget //
    echo $before_widget;

    // Title of widget //
    if ( $title ) { echo $before_title . $title . $after_title; }

    // Widget output //

?>
<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget

  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'title' => __('Archive', 'tcd-w'));
    $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p><?php _e('This widget will display monthly archive list by dropdown menu.', 'tcd-w');  ?></p>
<?php
  } // end function form

} // end class

// End class widget
add_action('widgets_init', create_function('', 'return register_widget("tcd_archive_dropdown");'));


?>