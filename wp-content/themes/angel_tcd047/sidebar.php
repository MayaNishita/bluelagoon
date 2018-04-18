<?php if(!is_page()&&is_home()) { ?>

 <?php if(is_active_sidebar('index_side_widget_left')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('index_side_widget_left'); ?>
 </div>
 <?php }; ?>

<?php } elseif(is_single()) { ?>

 <?php if(is_active_sidebar('single_side_widget_left')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('single_side_widget_left'); ?>
 </div>
 <?php }; ?>

<?php } elseif(is_page()) { ?>

 <?php if(is_active_sidebar('page_side_widget_left')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('page_side_widget_left'); ?>
 </div>
 <?php }; ?>

<?php } else { ?>

 <?php if(is_active_sidebar('archive_side_widget_left')) { ?>
 <div id="side_col">
  <?php dynamic_sidebar('archive_side_widget_left'); ?>
 </div>
 <?php }; ?>

<?php }; ?>