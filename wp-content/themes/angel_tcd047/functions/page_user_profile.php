<?php

function tcd_profile_template_meta_box() {
  add_meta_box(
    'tcd_profile_template',//ID of meta box
    __('Profile setting', 'tcd-w'),//label
    'show_tcd_profile_template_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'tcd_profile_template_meta_box');

function show_tcd_profile_template_meta_box() {
  global $post;

  $user_name = array( 'name' => __('User name', 'tcd-w'), 'desc' => '', 'id' => 'tcd_user_name', 'type' => 'input', 'std' => '' );
  $user_name_meta = esc_html(get_post_meta($post->ID, 'tcd_user_name', true));
  $twitter = array( 'name' => __('Your Twitter URL', 'tcd-w'), 'desc' => '', 'id' => 'tcd_twitter_url', 'type' => 'input', 'std' => '' );
  $twitter_meta = esc_html(get_post_meta($post->ID, 'tcd_twitter_url', true));
  $facebook = array( 'name' => __('Your Facebook URL', 'tcd-w'), 'desc' => '', 'id' => 'tcd_facebook_url', 'type' => 'input', 'std' => '' );
  $facebook_meta = esc_html(get_post_meta($post->ID, 'tcd_facebook_url', true));
  $insta = array( 'name' => __('Your Instagram URL', 'tcd-w'), 'desc' => '', 'id' => 'tcd_insta_url', 'type' => 'input', 'std' => '' );
  $insta_meta = esc_html(get_post_meta($post->ID, 'tcd_insta_url', true));
  $pint = array( 'name' => __('Your Pinterest URL', 'tcd-w'), 'desc' => '', 'id' => 'tcd_pint_url', 'type' => 'input', 'std' => '' );
  $pint_meta = esc_html(get_post_meta($post->ID, 'tcd_pint_url', true));
  $mail = array( 'name' => __('Your Contact page URL (You can use mailto:)', 'tcd-w'), 'desc' => '', 'id' => 'tcd_mail_url', 'type' => 'input', 'std' => '' );
  $mail_meta = esc_html(get_post_meta($post->ID, 'tcd_mail_url', true));


  // ---------------------------------------------------------------------

  echo '<input type="hidden" name="custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  echo '<p class="mlcf_instruction">' , __('Please select <strong>Profile page</strong> from page template to show this data.', 'tcd-w') ,'</p>';

  echo '<dl class="ml_custom_fields">';

  echo '<dt class="label"><label for="' , $user_name['id'] , '">' , $user_name['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $user_name['id'], '" id="', $user_name['id'], '" value="', $user_name_meta ? $user_name_meta : $user_name['std'], '" size="30" style="width:100%" />';

  echo '<dt class="label"><label>' , __('User image', 'tcd-w') ,'</label></dt>';
  echo '<dd class="content">';
    mlcf_media_form('tcd_user_image', __('Image', 'tcd-w'));
  echo '</dd>';

  echo '<dt class="label"><label for="' , $twitter['id'] , '">' , $twitter['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $twitter['id'], '" id="', $twitter['id'], '" value="', $twitter_meta ? $twitter_meta : $twitter['std'], '" size="30" style="width:100%" />';

  echo '<dt class="label"><label for="' , $facebook['id'] , '">' , $facebook['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $facebook['id'], '" id="', $facebook['id'], '" value="', $facebook_meta ? $facebook_meta : $facebook['std'], '" size="30" style="width:100%" />';

  echo '<dt class="label"><label for="' , $insta['id'] , '">' , $insta['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $insta['id'], '" id="', $insta['id'], '" value="', $insta_meta ? $insta_meta : $insta['std'], '" size="30" style="width:100%" />';

  echo '<dt class="label"><label for="' , $pint['id'] , '">' , $pint['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $pint['id'], '" id="', $pint['id'], '" value="', $pint_meta ? $pint_meta : $insta['std'], '" size="30" style="width:100%" />';

  echo '<dt class="label"><label for="' , $mail['id'] , '">' , $mail['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $mail['id'], '" id="', $mail['id'], '" value="', $mail_meta ? $mail_meta : $mail['std'], '" size="30" style="width:100%" />';

  echo '</dl>';

}

function save_custom_fields_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_fields_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('tcd_user_name', 'tcd_user_image' ,'tcd_twitter_url','tcd_facebook_url','tcd_insta_url','tcd_pint_url','tcd_mail_url');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

}
add_action('save_post', 'save_custom_fields_meta_box');



?>