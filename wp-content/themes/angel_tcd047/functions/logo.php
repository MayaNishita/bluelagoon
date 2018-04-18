<?php

//ヘッダーロゴ　---------------------------------------------------------------------------------------------
function header_logo(){

  $options = get_desing_plus_option();

  $logo_image = wp_get_attachment_image_src( $options['header_logo_image'], 'full' );
  if(!empty($logo_image)) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['header_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = wp_get_attachment_image_src( $options['header_logo_image_mobile'], 'full' );
  if(!empty($logo_image_mobile)) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if($options['header_logo_retina_mobile'] == 1) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
	$tagline = get_bloginfo('description');
  $url = home_url();

  if($options['use_logo_image'] == 'yes'){
?>
<div id="logo_image">
 <h1 class="logo">
  <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
   <?php if(!empty($logo_image)) { ?>
   <img class="pc_logo_image" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
   <?php }; ?>
   <?php if(!empty($logo_image_mobile)) { ?>
   <img class="mobile_logo_image" src="<?php echo esc_attr($logo_image_mobile[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" />
   <?php } elseif(!empty($logo_image)) { // モバイル専用の画像が無い場合はPC用の画像を表示 ?>
   <img class="mobile_logo_image" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
   <?php }; ?>
  </a>
 </h1>
</div>
<?php } else { ?>
<div id="logo_text">
 <h1 class="logo"><a href="<?php echo esc_url($url); ?>/"><?php echo esc_html($title); ?></a></h1>
 <?php if($options['show_tagline'] == 1){ ?><h2 class="tagline" style="font-size:<?php echo esc_html($options['tagline_font_size']); ?>px;"><?php echo esc_html($tagline); ?></h2><?php }; ?>
</div>
<?php
  };
}


?>