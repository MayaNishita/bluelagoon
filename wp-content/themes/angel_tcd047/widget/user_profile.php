<?php

class tcd_user_profile_widget extends WP_Widget {

  // Constructor //
  function __construct() {
    parent::__construct(
      'tcd_user_profile_widget',// ID
      __( 'Designed user profile (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcd_user_profile_widget',
        'description' => __('Displays designed user profile.', 'tcd-w')
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {
    extract( $args );
    $user_image = wp_get_attachment_image_src( $instance['user_image'], 'size1' );
    $url = $instance['url'];
    $label = $instance['label'];
    $desc = $instance['desc'];
    $twitter_url = $instance['twitter_url'];
    $facebook_url = $instance['facebook_url'];
    $insta_url = $instance['insta_url'];
    $pint_url = $instance['pint_url'];
    $mail_url = $instance['mail_url'];

    // Before widget //
    echo $before_widget;

    // Widget output //
?>
  <?php if($user_image) { ?><a class="user_avatar" href="<?php echo esc_url($url); ?>"><img src="<?php echo esc_attr($user_image[0]); ?>" alt="" /></a><?php }; ?>
  <?php if($desc) { ?><p class="user_desc"><?php echo $desc; ?></p><?php }; ?>
  <?php if($url) { ?><p class="button"><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></p><?php }; ?>
  <?php if($twitter_url || $facebook_url || $insta_url || $pint_url || $mail_url) { ?>
  <ul class="user_sns clearfix">
   <?php if ($twitter_url) : ?><li class="twitter_button"><a target="_blank" href="<?php echo esc_url($twitter_url); ?>"><span>Twitter</span></a></li><?php endif; ?>
   <?php if ($facebook_url) : ?><li class="facebook_button"><a target="_blank" href="<?php echo esc_url($facebook_url); ?>"><span>Facebook</span></a></li><?php endif; ?>
   <?php if ($insta_url) : ?><li class="insta_button"><a target="_blank" rel="nofollow" href="<?php echo esc_url($insta_url); ?>" title="Instagram"><span>Instagram</span></a></li><?php endif; ?>
   <?php if ($pint_url) : ?><li class="pint_button"><a target="_blank" rel="nofollow" href="<?php echo esc_url($pint_url); ?>" title="Pinterest"><span>Pinterest</span></a></li><?php endif; ?>
   <?php if ($mail_url) : ?><li class="mail_button"><a target="_blank" href="<?php echo esc_url($mail_url); ?>"><span>Contact</span></a></li><?php endif; ?>
  </ul>
  <?php }; ?>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget

  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['user_image'] = strip_tags($new_instance['user_image']);
    $instance['url'] = esc_url($new_instance['url']);
    $instance['label'] = strip_tags($new_instance['label']);
    $instance['desc'] = $new_instance['desc'];
    $instance['twitter_url'] = esc_url($new_instance['twitter_url']);
    $instance['facebook_url'] = esc_url($new_instance['facebook_url']);
    $instance['insta_url'] = esc_url($new_instance['insta_url']);
    $instance['pint_url'] = esc_url($new_instance['pint_url']);
    $instance['mail_url'] = esc_url($new_instance['mail_url']);
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'user_image' => '', 'url' =>'', 'label' =>'', 'desc' =>'', 'twitter_url' =>'', 'facebook_url' =>'', 'insta_url' =>'', 'pint_url' =>'', 'mail_url' =>'');
    $instance = wp_parse_args( (array) $instance, $defaults );

?>
<div>
 <p><label for="<?php echo $this->get_field_id( 'user_image' ); ?>"><?php _e('User image', 'tcd-w'); ?></label><br /><?php _e('Recommend image size. Width:400px Height:400px.', 'tcd-w'); ?></p>
 <div class="widget_media_upload cf cf_media_field hide-if-no-js <?php echo $this->get_field_id('user_image'); ?>">
  <input type="hidden" value="<?php echo $instance['user_image']; ?>" id="<?php echo $this->get_field_id('user_image'); ?>" name="<?php echo $this->get_field_name('user_image'); ?>" class="cf_media_id">
  <div class="preview_field"><?php if($instance['user_image']){ echo wp_get_attachment_image($instance['user_image'], 'size1'); }; ?></div>
  <div class="buttton_area">
   <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
   <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$instance['user_image']){ echo 'hidden'; }; ?>">
  </div>
 </div>
</div>
<p>
 <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('User description', 'tcd-w'); ?></label>
 <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $instance['desc']; ?></textarea>
</p>
<p>
 <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Button link url', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>'" type="text" value="<?php echo esc_url($instance['url']); ?>" />
</p>
<p>
 <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Button link label', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo $this->get_field_name('label'); ?>'" type="text" value="<?php echo $instance['label']; ?>" />
</p>
<ul>
 <li>
  <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Your Twitter URL', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>'" type="text" value="<?php echo esc_url($instance['twitter_url']); ?>" />
 </li>
 <li>
  <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Your Facebook URL', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>'" type="text" value="<?php echo esc_url($instance['facebook_url']); ?>" />
 </li>
 <li>
  <label for="<?php echo $this->get_field_id('insta_url'); ?>"><?php _e('Your Instagram URL', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('insta_url'); ?>" name="<?php echo $this->get_field_name('insta_url'); ?>'" type="text" value="<?php echo esc_url($instance['insta_url']); ?>" />
 </li>
 <li>
  <label for="<?php echo $this->get_field_id('pint_url'); ?>"><?php _e('Your Pinterest URL', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('pint_url'); ?>" name="<?php echo $this->get_field_name('pint_url'); ?>'" type="text" value="<?php echo esc_url($instance['pint_url']); ?>" />
 </li>
 <li>
  <label for="<?php echo $this->get_field_id('mail_url'); ?>"><?php _e('Your Contact page URL (You can use mailto:)', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('mail_url'); ?>" name="<?php echo $this->get_field_name('mail_url'); ?>'" type="text" value="<?php echo esc_url($instance['mail_url']); ?>" />
 </li>
</ul>
<?php

  } // end function form
} // end class

add_action('widgets_init', create_function('', 'return register_widget("tcd_user_profile_widget");'));

?>
