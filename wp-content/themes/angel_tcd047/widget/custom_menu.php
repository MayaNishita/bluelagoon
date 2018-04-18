<?php
class tcdw_menu_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcdw_menu_widget',// ID
      __( 'Custom menu (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcdw_menu_widget',
        'description' => __('Displays designed custom menu.', 'tcd-w')
      )
    );
  }

  public function widget( $args, $instance ) {

    // Get menu
    $nav_menu1 = ! empty( $instance['nav_menu1'] ) ? wp_get_nav_menu_object( $instance['nav_menu1'] ) : false;
    $nav_menu2 = ! empty( $instance['nav_menu2'] ) ? wp_get_nav_menu_object( $instance['nav_menu2'] ) : false;
    $nav_menu_headline1 = ( ! empty( $instance['nav_menu_headline1'] ) ) ? $instance['nav_menu_headline1'] : null;
    $nav_menu_headline2 = ( ! empty( $instance['nav_menu_headline2'] ) ) ? $instance['nav_menu_headline2'] : null;

    if ( !$nav_menu1 && !$nav_menu2 )
      return;

    echo $args['before_widget'];

    $nav_menu_args1 = array(
      'fallback_cb' => '',
      'menu' => $nav_menu1,
      'depth' => 1
		);

    $nav_menu_args2 = array(
      'fallback_cb' => '',
      'menu' => $nav_menu2,
      'depth' => 1
		);

?>

<?php if($nav_menu1) { ?>
<div class="menu1">
 <?php if(!empty($nav_menu_headline1)) { ?><h5 class="menu_headline"><?php echo esc_html($nav_menu_headline1); ?></h5><?php }; ?>
 <?php wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args1, $nav_menu1, $args, $instance ) ); ?>
</div>
<?php }; ?>
<?php if($nav_menu2) { ?>
<div class="menu2">
 <?php if(!empty($nav_menu_headline2)) { ?><h5 class="menu_headline"><?php echo esc_html($nav_menu_headline2); ?></h5><?php }; ?>
 <?php wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args2, $nav_menu2, $args, $instance ) ); ?>
</div>
<?php }; ?>

<?php

    echo $args['after_widget'];

  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    if ( ! empty( $new_instance['nav_menu1'] ) ) {
      $instance['nav_menu1'] = (int) $new_instance['nav_menu1'];
    }
    if ( ! empty( $new_instance['nav_menu2'] ) ) {
      $instance['nav_menu2'] = (int) $new_instance['nav_menu2'];
    }
    if ( ! empty( $new_instance['nav_menu_headline1'] ) ) {
      $instance['nav_menu_headline1'] = strip_tags($new_instance['nav_menu_headline1']);
    }
    if ( ! empty( $new_instance['nav_menu_headline2'] ) ) {
      $instance['nav_menu_headline2'] = strip_tags($new_instance['nav_menu_headline2']);
    }
    return $instance;
  }

  public function form( $instance ) {
    $nav_menu1 = isset( $instance['nav_menu1'] ) ? $instance['nav_menu1'] : '';
    $nav_menu2 = isset( $instance['nav_menu2'] ) ? $instance['nav_menu2'] : '';

    $defaults = array('nav_menu_headline1' => __('Menu1', 'tcd-w'), 'nav_menu_headline2' => __('Menu2', 'tcd-w'));
    $instance = wp_parse_args( (array) $instance, $defaults );

    // Get menus
    $menus1 = wp_get_nav_menus();
    $menus2 = wp_get_nav_menus();

    // If no menus exists, direct the user to go and create some.
?>
<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus1 ) ) { echo ' style="display:none" '; } ?>>
<?php
     if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
       $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
     } else {
       $url = admin_url( 'nav-menus.php' );
     }
?>
<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
</p>
<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus1 ) ) { echo ' style="display:none" '; } ?>>
 <p>
  <label for="<?php echo $this->get_field_id('nav_menu_headline1'); ?>"><?php _e('Headline of menu1', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('nav_menu_headline1'); ?>" name="<?php echo $this->get_field_name('nav_menu_headline1'); ?>'" type="text" value="<?php echo $instance['nav_menu_headline1']; ?>" />
 </p>
 <p>
  <label for="<?php echo $this->get_field_id( 'nav_menu1' ); ?>"><?php _e( 'Select menu for menu1' , 'tcd-w'); ?></label>
  <select class="widefat" id="<?php echo $this->get_field_id( 'nav_menu1' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu1' ); ?>">
   <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
   <?php foreach ( $menus1 as $menu1 ) : ?>
   <option value="<?php echo esc_attr( $menu1->term_id ); ?>" <?php selected( $nav_menu1, $menu1->term_id ); ?>><?php echo esc_html( $menu1->name ); ?></option>
   <?php endforeach; ?>
  </select>
 </p>
 <p>
  <label for="<?php echo $this->get_field_id('nav_menu_headline2'); ?>"><?php _e('Headline of menu2', 'tcd-w'); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('nav_menu_headline2'); ?>" name="<?php echo $this->get_field_name('nav_menu_headline2'); ?>'" type="text" value="<?php echo $instance['nav_menu_headline2']; ?>" />
 </p>
 <p>
  <label for="<?php echo $this->get_field_id( 'nav_menu2' ); ?>"><?php _e( 'Select menu for menu2' , 'tcd-w'); ?></label>
  <select class="widefat" id="<?php echo $this->get_field_id( 'nav_menu2' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu2' ); ?>">
   <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
   <?php foreach ( $menus2 as $menu2 ) : ?>
   <option value="<?php echo esc_attr( $menu2->term_id ); ?>" <?php selected( $nav_menu2, $menu2->term_id ); ?>><?php echo esc_html( $menu2->name ); ?></option>
   <?php endforeach; ?>
  </select>
 </p>
</div>
<?php

	} // end Widget Control Panel

} // end class

add_action('widgets_init', create_function('', 'return register_widget("tcdw_menu_widget");'));

?>