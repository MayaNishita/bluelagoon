<?php if(!is_page()&&is_home()) { ?>

 <?php if(is_active_sidebar('mobile_widget_index')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('mobile_widget_index'); ?>
 </div>
 <?php }; ?>

<?php } elseif(is_single()) { ?>

 <?php if(is_active_sidebar('mobile_widget_single')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('mobile_widget_single'); ?>
 </div>
 <?php }; ?>

<?php } elseif(is_page()) { ?>

 <?php if(is_active_sidebar('mobile_widget_page')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('mobile_widget_page'); ?>
 </div>
 <?php }; ?>

<?php } else { ?>

 <?php if(is_active_sidebar('mobile_widget_archive')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('mobile_widget_archive'); ?>
 </div>
 <?php }; ?>

<?php }; ?>