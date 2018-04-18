<?php

/* 固定ページ用広告バナー -------------------------------------------------------------------- */
function theme_option_page_banner() {

  global $post;
  $show_banner = get_post_meta($post->ID, 'show_banner', true);
  if(empty($show_banner)) {
    $show_banner = 'off';
  }

	$options = get_desing_plus_option();

  if($show_banner == 'on') {

    if( $options['page_ad_code1'] || $options['page_ad_image1'] || $options['page_ad_code2'] || $options['page_ad_image2'] ) {

      $html = '';

      if( !$options['page_ad_code2'] && !$options['page_ad_image2'] ) {
        $html .= '<div id="page_banner" class="clearfix one_banner">' . "\n";
      } else {
        $html .= '<div id="page_banner" class="clearfix">' . "\n";
      }

      if ($options['page_ad_code1']) {
        $html .= '<div class="page_banner banner_left">' . "\n";
        $html .= $options['page_ad_code1'] . "\n";
        $html .= '</div>' . "\n";
      } elseif($options['page_ad_image1']) {
        $page_image1 = wp_get_attachment_image_src( $options['page_ad_image1'], 'full' );
        $html .= '<div class="page_banner banner_left">' . "\n";
        $html .= '<a href="' . $options['page_ad_url1'] . '" target="_blank"><img src="' . $page_image1[0] . '" alt="" title="" /></a>' . "\n";
        $html .= '</div>' . "\n";
      }

      if ($options['page_ad_code2']) {
        $html .= '<div class="page_banner banner_right">' . "\n";
        $html .= $options['page_ad_code2'] . "\n";
        $html .= '</div>' . "\n";
      } elseif($options['page_ad_image2']) {
        $page_image2 = wp_get_attachment_image_src( $options['page_ad_image2'], 'full' );
        $html .= '<div class="page_banner banner_right">' . "\n";
        $html .= '<a href="' . $options['page_ad_url2'] . '" target="_blank"><img src="' . $page_image2[0] . '" alt="" title="" /></a>' . "\n";
        $html .= '</div>' . "\n";
      }

      $html .= '</div>' . "\n";

      echo $html;

    };

  }; // show page ad

}


/* 固定ページ用記事一覧 -------------------------------------------------------------------- */
function theme_option_page_post_list() {

  global $post;
  $show_post_list = get_post_meta($post->ID, 'show_post_list', true);
  if(empty($show_post_list)) {
    $show_post_list = 'off';
  }

	$options = get_desing_plus_option();

  if($show_post_list == 'on') {

  $post_num = $options['page_post_list_num'];
  $post_type = $options['page_post_list_type'];
  $post_order = $options['page_post_list_order'];
  if($post_order=='date2'){
    $order = 'ASC';
  } else {
    $order = 'DESC';
  };
  if($post_order=='date1'||$post_order=='date2'){
    $post_order = 'date';
  };
  if($post_type == 'recent_post') {
    $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order);
  } else {
    $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order, 'meta_key' => $post_type, 'meta_value' => 'on');
  };
  $index_slider = new WP_Query($args);
  if ($index_slider->have_posts()) {
    $html = '';
    $html .= '<div class="page_post_list">' . "\n";
    $html .= '<h3 class="headline" style="font-size:' . $options['page_post_list_headline_font_size'] . 'px;">' . $options['page_post_list_headline'] . "</h3>\n";
    $html .= '<ol class="clearfix">' . "\n";
    while ($index_slider->have_posts()) : $index_slider->the_post();
      $no_image1 = wp_get_attachment_image_src( $options['no_image1'], 'full' );
      $html .= '<li>' . "\n";
      if ( $options['page_post_list_show_cat'] ){
        $html .= '<p class="category">' . show_parent_category() . "</p>\n";
      };
      $html .= '<div class="image_area"><a class="image" href="' . esc_url(get_the_permalink()) . '" title="' . esc_html(get_the_title()) . '">';
      if(has_post_thumbnail()) {
        $html .= get_the_post_thumbnail($index_slider->ID, 'size1');
      } else {
        $html .= '<img src="';
        if(!empty($no_image3)) {
          $html .= esc_attr($no_image3[0]);
        } else {
          $html .= get_bloginfo('template_url') . '/img/common/no_image1.gif';
        };
        $html .= '" title="" alt="" />';
      };
      $html .= "</a></div>\n";
      $html .= '<a class="title" href="' . esc_url(get_the_permalink()) . '" title="' . esc_html(get_the_title()) . '">' . trim_title_sc(30) . "</a>\n";
      if ( $options['page_post_list_show_date'] || $options['page_post_list_show_cat']){
        $html .= '<ul class="meta clearfix">' . "\n";
        if ( $options['page_post_list_show_date'] ){
          $html .=  '<li><time class="entry-date updated" datetime="' . get_the_modified_time('c') . '">' . get_the_time('Y.m.j') . "</time></li>\n";
        };
        $html .= show_child_category();
        $html .= "</ul>\n";
      };
      $html .= '</li>' . "\n";
    endwhile; wp_reset_query();
    $html .= '</ol>' . "\n";
    $html .= '</div>' . "\n";

    echo $html;

  };

  }; // show page post list

}



// 広告と記事一覧の設定 ----------------------------------------------------------------------------------------------------------------------------------
function ad_post_list_meta_box() {
  add_meta_box(
    'ad_post_list_meta_box',//ID of meta box
    __('Banner and Post list setting', 'tcd-w'),//label
    'show_ad_post_list_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'ad_post_list_meta_box');

function show_ad_post_list_meta_box() {
  global $post;
  $options =  get_desing_plus_option();

  $show_banner = array( 'label' => __('Display banner', 'tcd-w'), 'id' => 'show_banner', 'type' => 'checkbox', 'value' => 'on', 'std' => '');
  $show_banner_meta = esc_html(get_post_meta($post->ID, 'show_banner', true));

  $show_post_list = array( 'label' => __('Display post list', 'tcd-w'), 'id' => 'show_post_list', 'type' => 'checkbox', 'value' => 'on', 'std' => '');
  $show_post_list_meta = esc_html(get_post_meta($post->ID, 'show_post_list', true));

  // ---------------------------------------------------------------------

  echo '<input type="hidden" name="ad_post_list_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************

  echo '<dl class="ml_custom_fields">';

  echo '<dt class="label">' , __('Display setting', 'tcd-w') , '</dt>';
  echo '<dd class="content">';
  echo '<p><label for="' , $show_banner['id'] , '"><input type="checkbox" name="', $show_banner['id'], '" id="', $show_banner['id'], '" value="', $show_banner['value'], '"', ($show_banner_meta == $show_banner['value'] || !empty($show_banner_meta) ) ? ' checked="checked"' : '', '/>' , $show_banner['label'] , '</label></p>';
  echo '<p><label for="' , $show_post_list['id'] , '"><input type="checkbox" name="', $show_post_list['id'], '" id="', $show_post_list['id'], '" value="', $show_post_list['value'], '"', ($show_post_list_meta == $show_post_list['value'] || !empty($show_post_list_meta) ) ? ' checked="checked"' : '', '/>' , $show_post_list['label'] , '</label></p>';
  echo '</dd>';

  echo '</dl>';

}

function save_ad_post_list_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['ad_post_list_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['ad_post_list_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array(
		'show_banner',
		'show_post_list'
	);
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
add_action('save_post', 'save_ad_post_list_meta_box');


?>