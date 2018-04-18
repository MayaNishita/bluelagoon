<?php
     get_header();
     $options = get_desing_plus_option();

    $image = null;
    if (!empty($options['header_image_404'])) {
      $image = wp_get_attachment_image_src($options['header_image_404'], 'full');
    }
    if (!empty($image[0])) {
      $title = $options['header_txt_404'];
      $sub_title = $options['header_sub_txt_404'];
      $font_color = ( ! empty( $options['header_txt_color_404'] ) ) ? $options['header_txt_color_404'] : 'ffffff';
      $shadow1 = ( ! empty( $options['dropshadow_404_h'] ) ) ? $options['dropshadow_404_h'] : 2;
      $shadow2 = ( ! empty( $options['dropshadow_404_v']) ) ? $options['dropshadow_404_v'] : 2;
      $shadow3 = ( ! empty( $options['dropshadow_404_b'] ) ) ? $options['dropshadow_404_b'] : 2;
      $shadow4 = ( ! empty( $options['dropshadow_404_c'] ) ) ? $options['dropshadow_404_c'] : '888888';
?>
<div id="header_image_for_404">
<?php if ($title || $sub_title) { ?>
 <div class="caption" style="text-shadow:<?php echo $shadow1; ?>px <?php echo $shadow2; ?>px <?php echo $shadow3; ?>px #<?php echo $shadow4; ?>; color:#<?php echo $font_color; ?>; ">
<?php if ($title) { ?>
  <p class="headline rich_font"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($title)); ?></p>
<?php } ?>
<?php if ($sub_title) { ?>
  <p class="sub_title"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($sub_title)); ?></p>
<?php } ?>
 </div>
<?php } ?>
 <img src="<?php echo $image[0]; ?>" title="" alt="" />
</div>
<?php } else { ?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col">

  <article id="article">

   <div class="post_content clearfix">
    <p style="margin-bottom:45px;"><?php _e("Sorry, but you are looking for something that isn't here.","tcd-w"); ?></p>
   </div>

  </article><!-- END #article -->

</div><!-- END #main_col -->

<?php }; ?>

<?php get_footer(); ?>