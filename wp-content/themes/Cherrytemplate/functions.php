<?php

register_nav_menu( 'header-nav','Header' );
register_nav_menu( 'footer-nav','Footer' );
function update_profile_fields( $contactmethods ) {
    //項目の削除
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    //項目の追加
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';

    return $contactmethods;
}
add_filter('user_contactmethods','update_profile_fields',10,1);
/***********************************************************
* widget-area
***********************************************************/

add_action( 'widgets_init', 'wcct_widgets_init' );
register_sidebar(array(
     'name' => 'slider' ,
     'id' => 'topslider' ,
     'before_widget' => '<div class="metaslider">',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 300, array( 'center', 'center')  );
