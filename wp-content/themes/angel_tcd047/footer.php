<?php $options = get_desing_plus_option(); ?>

 </div><!-- END #main_contents -->

 <div id="footer" class="clearfix">

   <?php
        // footer widget left ------------------------------
        if( !wp_is_mobile() || is_no_responsive() ) {
          if(is_active_sidebar('footer_left_widget')) {
   ?>
   <div class="footer_widget" id="footer_left_widget">
    <?php dynamic_sidebar('footer_left_widget'); ?>
   </div>
   <?php
          };
        } else {
          if(is_active_sidebar('footer_mobile_widget')) {
   ?>
   <div class="footer_widget" id="footer_mobile_widget">
    <?php dynamic_sidebar('footer_mobile_widget'); ?>
   </div>
   <?php }; }; ?>

   <?php
        // footer widget center ------------------------------
        if( !wp_is_mobile() || is_no_responsive() ) {
          if(is_active_sidebar('footer_center_widget')) {
   ?>
   <div class="footer_widget" id="footer_center_widget">
    <?php dynamic_sidebar('footer_center_widget'); ?>
   </div>
   <?php }; }; ?>

   <?php
        // footer widget right ------------------------------
        if( !wp_is_mobile() || is_no_responsive() ) {
          if(is_active_sidebar('footer_right_widget')) {
   ?>
   <div class="footer_widget" id="footer_right_widget">
    <?php dynamic_sidebar('footer_right_widget'); ?>
   </div>
   <?php }; }; ?>

 </div><!-- END #footer_top -->

 <?php
      // social button for mobile device
      if ($options['show_rss'] || $options['twitter_url'] || $options['facebook_url'] || $options['insta_url'] || $options['pint_url'] || $options['mail_url']) {
 ?>
 <ul id="footer_social_link" class="social_link clearfix">
  <?php if ($options['twitter_url']) : ?><li class="twitter"><a class="target_blank" href="<?php echo esc_url($options['twitter_url']); ?>">Twitter</a></li><?php endif; ?>
  <?php if ($options['facebook_url']) : ?><li class="facebook"><a class="target_blank" href="<?php echo esc_url($options['facebook_url']); ?>">Facebook</a></li><?php endif; ?>
  <?php if ($options['insta_url']) : ?><li class="insta"><a class="target_blank" href="<?php echo esc_url($options['insta_url']); ?>">Instagram</a></li><?php endif; ?>
  <?php if ($options['pint_url']) : ?><li class="pint"><a class="target_blank" href="<?php echo esc_url($options['pint_url']); ?>">Pinterest</a></li><?php endif; ?>
  <?php if ($options['mail_url']) : ?><li class="mail"><a class="target_blank" href="<?php echo esc_url($options['mail_url']); ?>">Contact</a></li><?php endif; ?>
  <?php if ($options['show_rss']) : ?><li class="rss"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">RSS</a></li><?php endif; ?>
 </ul>
 <?php }; ?>

 <div id="footer_bottom">
  <div id="footer_bottom_inner" class="clearfix">

   <?php if (has_nav_menu('footer-menu')) { ?>
   <div id="footer_menu" class="clearfix">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu' , 'container' => '' , 'depth' => '1') ); ?>
   </div>
   <?php }; ?>

   <p id="copyright"><?php _e('Copyright &copy;&nbsp; ', 'tcd-w'); ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>

   <div id="return_top">
    <a href="#body"><span><?php _e('PAGE TOP', 'tcd-w'); ?></span></a>
   </div>

  </div><!-- END #footer_bottom_inner -->
 </div><!-- END #footer_bottom -->

 <?php
      // footer navi bar for mobile device -------------------
      if( wp_is_mobile() ) { get_template_part('footer-bar'); };
 ?>

<?php if ($options['use_load_icon']) { ?>
</div><!-- #site_wrap -->

<script>
 <?php if(wp_is_mobile()) { ?>
 jQuery(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
      window.location.reload()
    }
 });
 <?php }; ?>

 jQuery(document).ready(function($){

  function after_load() {
    $('#site_loader_spinner').delay(300).fadeOut(600);
    $('#site_loader_overlay').delay(600).fadeOut(900);
    $('#site_wrap').css('display', 'block');
    <?php
         // page builder -----------------------------------
         if(is_single() || is_page()) {
           if(page_builder_has_widget('pb-widget-slider')) {
             echo "$('.pb_slider').slick('setPosition');\n";
           };
         };
    ?>
  }

  $(window).load(function () {
    after_load();
    <?php
         if(is_front_page()) {
           if($options['show_index_slider'] == 1) {
             echo "$('#header_slider').slick('setPosition');\n";
           };
         };
         if($options['show_footer_slider'] == 1) {
           echo "$('#footer_slider').slick('setPosition');\n";
         };
    ?>
  });

  $(function(){
    setTimeout(function(){
      if( $('#site_loader_overlay').is(':visible') ) {
        after_load();
      }
    }, <?php if($options['load_time']) { echo esc_html($options['load_time']); } else { echo '7000'; }; ?>);
  });

 });

</script>
<?php } // if use loading screen ?>

<?php
     // share button ----------------------------------------------------------------------
     if ( is_single() && ( $options['show_sns_top'] || $options['show_sns_btm'] ) ) :
       if ( 'type5' == $options['sns_type_top'] || 'type5' == $options['sns_type_btm'] ) :
         if ( $options['show_twitter_top'] || $options['show_twitter_btm'] ) :
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
         endif;
         if ( $options['show_fblike_top'] || $options['show_fbshare_top'] || $options['show_fblike_btm'] || $options['show_fbshare_btm'] ) :
?>
<!-- facebook share button code -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
         endif;
         if ( $options['show_google_top'] || $options['show_google_btm'] ) :
?>
<script type="text/javascript">window.___gcfg = {lang: 'ja'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
</script>
<?php
         endif;
         if ( $options['show_hatena_top'] || $options['show_hatena_btm'] ) :
?>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
         endif;
         if ( $options['show_pocket_top'] || $options['show_pocket_btm'] ) :
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
         endif;
         if ( $options['show_pinterest_top'] || $options['show_pinterest_btm'] ) :
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
         endif;
       endif;
     endif;
?>
<?php wp_footer(); ?>
<!-- Side Nav -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery_side_nav.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bundle.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/side_nav.js"></script>
<!-- END Side Nav -->
</body>
</html>
