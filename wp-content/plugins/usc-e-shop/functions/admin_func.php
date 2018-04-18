<?php
function usces_states_form_js(){
	global $usces;
	
	$js = '';
	if( $usces->use_js 
			&& ((  (is_page(USCES_MEMBER_NUMBER) || $usces->is_member_page($_SERVER['REQUEST_URI'])) && ((true === $usces->is_member_logged_in() && WCUtils::is_blank($usces->page)) || 'member' == $usces->page || 'editmemberform' == $usces->page || 'newmemberform' == $usces->page)  )
			|| (  (is_page(USCES_CART_NUMBER) || $usces->is_cart_page($_SERVER['REQUEST_URI'])) && ('customer' == $usces->page || 'delivery' == $usces->page)  ) 
			)) {
			
		$js .= '<script type="text/javascript">
		(function($) {
		uscesForm = {
			settings: {
				url: uscesL10n.ajaxurl,
				type: "POST",
				cache: false,
				success: function(data, dataType){
					//$("tbody#item-opt-list").html( data );
				}, 
				error: function(msg){
					//$("#ajax-response").html(msg);
				}
			},
			
			changeStates : function( country, type ) {
	
				var s = this.settings;
				s.url = "' . USCES_SSL_URL . '/";
				s.data = "usces_ajax_action=change_states&country=" + country;
				s.success = function(data, dataType){
					if( "error" == data ){
						alert("error");
					}else{
						$("select#" + type + "_pref").html( data );
						if( customercountry == country && "customer" == type ){
							$("#" + type + "_pref").attr({selectedIndex:customerstate});
						}else if( deliverycountry == country && "delivery" == type ){
							$("#" + type + "_pref").attr({selectedIndex:deliverystate});
						}else if( customercountry == country && "member" == type ){
							$("#" + type + "_pref").attr({selectedIndex:customerstate});
						}
					}
				};
				s.error = function(msg){
					alert("error");
				};
				$.ajax( s );
				return false;
			}
		};';
		
		if( 'customer' == $usces->page ){
	
			$js .= 'var customerstate = $("#customer_pref").get(0).selectedIndex;
			var customercountry = $("#customer_country").val();
			var deliverystate = "";
			var deliverycountry = "";
			var memberstate = "";
			var membercountry = "";
			$("#customer_country").change(function () {
				var country = $("#customer_country option:selected").val();
				uscesForm.changeStates( country, "customer" ); 
			});';
			
		}elseif( 'delivery' == $usces->page ){
			
			$js .= 'var customerstate = "";
			var customercountry = "";
			var deliverystate = $("#delivery_pref").get(0).selectedIndex;
			var deliverycountry = $("#delivery_country").val();
			var memberstate = "";
			var membercountry = "";
			$("#delivery_country").change(function () {
				var country = $("#delivery_country option:selected").val();
				uscesForm.changeStates( country, "delivery" ); 
			});';
			
		}elseif( (true === $usces->is_member_logged_in() && WCUtils::is_blank($usces->page)) || (true === $usces->is_member_logged_in() && 'member' == $usces->page) || 'editmemberform' == $usces->page || 'newmemberform' == $usces->page ){
			
			$js .= 'var customerstate = "";
			var customercountry = "";
			var deliverystate = "";
			var deliverycountry = "";
			var memberstate = $("#member_pref").get(0).selectedIndex;
			var membercountry = $("#member_country").val();
			$("#member_country").change(function () {
				var country = $("#member_country option:selected").val();
				uscesForm.changeStates( country, "member" ); 
			});';
		}
		$js .= '})(jQuery);
			</script>';
	}
	
	echo apply_filters('usces_filter_states_form_js', $js);
}

function usces_get_pointreduction($currency){
	global $usces, $usces_settings;

	$form = $usces_settings['currency'][$currency];
	if( 2 == $form[1] ){
		$reduction = 0.01;
	}else{
		$reduction = 1;
	}
	$reduction = apply_filters('usces_filter_pointreduction', $reduction);
	return $reduction;
}

//function admin_prodauct_meta_box(){
//	$wp_version = get_bloginfo('version');
//	if (version_compare($wp_version, '3.4-beta3', '<'))
//		return;
//	
//	if ( 'usces_itemedit' == $_GET['page'] && !isset($_GET['action']))
//		return;
//	
//
//}

function admin_prodauct_current_screen(){
	global $current_screen, $post;


	
	$wp_version = get_bloginfo('version');
	if (version_compare($wp_version, '3.4-beta3', '<'))
		return;
	
	if ( !(isset($_GET['page']) && (('usces_itemedit' == $_GET['page'] && isset($_GET['action'])) || 'usces_itemnew' == $_GET['page'])) )
		return;
	
	if ( isset( $_GET['post'] ) )
		$post_id = $post_ID = (int) $_GET['post'];
	elseif ( isset( $_POST['post_ID'] ) )
		$post_id = $post_ID = (int) $_POST['post_ID'];
	else
		$post_id = $post_ID = 0;

	$post_type = 'post';
	$post_type_object = get_post_type_object( $post_type );

	if ( $post_id ){
		$post = get_post( $post_id );
	}else{
		$post = get_default_post_to_edit( $post_type, true );
		$post_ID = $post->ID;
	}

	require_once(USCES_PLUGIN_DIR.'/includes/meta-boxes.php');

	add_meta_box('submitdiv', __('Publish'), 'usces_post_submit_meta_box', $post_type, 'side', 'core');

	// all taxonomies
	foreach ( get_object_taxonomies($post_type) as $tax_name ) {
		$taxonomy = get_taxonomy($tax_name);
		if ( ! $taxonomy->show_ui )
			continue;
	
		$label = $taxonomy->labels->name;
	
		if ( !is_taxonomy_hierarchical($tax_name) )
			add_meta_box('tagsdiv-' . $tax_name, $label, 'usces_post_tags_meta_box', $post_type, 'side', 'core');
		else
			add_meta_box($tax_name . 'div', $label, 'usces_post_categories_meta_box', $post_type, 'side', 'core', array( 'taxonomy' => $tax_name, 'descendants_and_self' => USCES_ITEM_CAT_PARENT_ID ));
	}
	
	if ( post_type_supports($post_type, 'page-attributes') )
		add_meta_box('pageparentdiv', 'page' == $post_type ? __('Page Attributes') : __('Attributes'), 'usces_page_attributes_meta_box', $post_type, 'side', 'core');
	
	if ( current_theme_supports( 'post-thumbnails', $post_type ) && post_type_supports($post_type, 'thumbnail') )
		add_meta_box('postimagediv', __('Featured Image'), 'usces_post_thumbnail_meta_box', $post_type, 'side', 'low');
	
	if ( post_type_supports($post_type, 'excerpt') )
		add_meta_box('postexcerpt', __('Excerpt'), 'usces_post_excerpt_meta_box', $post_type, 'normal', 'core');
	
	if ( post_type_supports($post_type, 'trackbacks') )
		add_meta_box('trackbacksdiv', __('Send Trackbacks'), 'usces_post_trackback_meta_box', $post_type, 'normal', 'core');
	
	if ( post_type_supports($post_type, 'custom-fields') )
		add_meta_box('postcustom', __('Custom Fields'), 'usces_post_custom_meta_box', $post_type, 'normal', 'core');
	
	//do_action('dbx_post_advanced');
	if ( post_type_supports($post_type, 'comments') )
		add_meta_box('commentstatusdiv', __('Discussion'), 'usces_post_comment_status_meta_box', $post_type, 'normal', 'core');
	
	if ( (isset($post->post_status) && ('publish' == $post->post_status || 'private' == $post->post_status) ) && post_type_supports($post_type, 'comments') )
		add_meta_box('commentsdiv', __('Comments'), 'usces_post_comment_meta_box', $post_type, 'normal', 'core');
	
	if ( !( (isset( $post->post_status ) && 'pending' == $post->post_status) && !current_user_can( $post_type_object->cap->publish_posts ) ) )
		add_meta_box('slugdiv', __('Slug'), 'usces_post_slug_meta_box', $post_type, 'normal', 'core');
	
	if ( post_type_supports($post_type, 'author') ) {
		if ( version_compare($wp_version, '3.1', '>=') ){
			if ( is_super_admin() || current_user_can( $post_type_object->cap->edit_others_posts ) )
				add_meta_box('authordiv', __('Author'), 'usces_post_author_meta_box', $post_type, 'normal', 'core');
		}else{
			$authors = get_editable_user_ids( $current_user->id ); // TODO: ROLE SYSTEM
			if ( isset($post->post_author) && $post->post_author && !in_array($post->post_author, $authors) )
				$authors[] = $post->post_author;
			if ( ( $authors && count( $authors ) > 1 ) || is_super_admin() )
				add_meta_box('authordiv', __('Author'), 'usces_post_author_meta_box', $post_type, 'normal', 'core');
		}
	}
	
	if ( post_type_supports($post_type, 'revisions') && 0 < $post_ID && wp_get_post_revisions( $post_ID ) )
		add_meta_box('revisionsdiv', __('Revisions'), 'usces_post_revisions_meta_box', $post_type, 'normal', 'core');
	
	//add_screen_option('layout_columns', array('max' => 2, 'default' => 2) );


	$current_screen->base = $post_type;
	$current_screen->id = $post_type;
	$current_screen->post_type = $post_type;
	//usces_p($current_screen);

}

function admin_prodauct_header(){

	$wp_version = get_bloginfo('version');
	if (version_compare($wp_version, '3.4-beta3', '<'))
		return;
	
	if ( isset($_REQUEST['action'])){
	
		$suport_display = '<p>'.__('Product registration documentation','usces').'<br /><a href="http://www.welcart.com/documents/manual-2/%E6%96%B0%E8%A6%8F%E5%95%86%E5%93%81%E8%BF%BD%E5%8A%A0" target="_new">'.__('Product editing screen','usces').'</a></p>';
	
		get_current_screen()->add_help_tab( array(
			'id'      => 'suport-display',
			'title'   => 'Documents',
			'content' => $suport_display,
		) );
//	
//		$title_and_editor  = '<p>' . __('<strong>Title</strong> - Enter a title for your post. After you enter a title, you&#8217;ll see the permalink below, which you can edit.') . '</p>';
//		$title_and_editor .= '<p>' . __('<strong>Post editor</strong> - Enter the text for your post. There are two modes of editing: Visual and HTML. Choose the mode by clicking on the appropriate tab. Visual mode gives you a WYSIWYG editor. Click the last icon in the row to get a second row of controls. The HTML mode allows you to enter raw HTML along with your post text. You can insert media files by clicking the icons above the post editor and following the directions. You can go to the distraction-free writing screen via the Fullscreen icon in Visual mode (second to last in the top row) or the Fullscreen button in HTML mode (last in the row). Once there, you can make buttons visible by hovering over the top area. Exit Fullscreen back to the regular post editor.') . '</p>';
//	
//		get_current_screen()->add_help_tab( array(
//			'id'      => 'title-post-editor',
//			'title'   => __('Title and Post Editor'),
//			'content' => $title_and_editor,
//		) );
//	
//		$publish_box = '<p>' . __('<strong>Publish</strong> - You can set the terms of publishing your post in the Publish box. For Status, Visibility, and Publish (immediately), click on the Edit link to reveal more options. Visibility includes options for password-protecting a post or making it stay at the top of your blog indefinitely (sticky). Publish (immediately) allows you to set a future or past date and time, so you can schedule a post to be published in the future or backdate a post.') . '</p>';
//	
//		if ( current_theme_supports( 'post-formats' ) && post_type_supports( 'post', 'post-formats' ) ) {
//			$publish_box .= '<p>' . __( '<strong>Post Format</strong> - This designates how your theme will display a specific post. For example, you could have a <em>standard</em> blog post with a title and paragraphs, or a short <em>aside</em> that omits the title and contains a short text blurb. Please refer to the Codex for <a href="http://codex.wordpress.org/Post_Formats#Supported_Formats">descriptions of each post format</a>. Your theme could enable all or some of 10 possible formats.' ) . '</p>';
//		}
//	
//		if ( current_theme_supports( 'post-thumbnails' ) && post_type_supports( 'post', 'thumbnail' ) ) {
//			$publish_box .= '<p>' . __('<strong>Featured Image</strong> - This allows you to associate an image with your post without inserting it. This is usually useful only if your theme makes use of the featured image as a post thumbnail on the home page, a custom header, etc.') . '</p>';
//		}
//	
//		get_current_screen()->add_help_tab( array(
//			'id'      => 'publish-box',
//			'title'   => __('Publish Box'),
//			'content' => $publish_box,
//		) );
//	
//		$discussion_settings  = '<p>' . __('<strong>Send Trackbacks</strong> - Trackbacks are a way to notify legacy blog systems that you&#8217;ve linked to them. Enter the URL(s) you want to send trackbacks. If you link to other WordPress sites they&#8217;ll be notified automatically using pingbacks, and this field is unnecessary.') . '</p>';
//		$discussion_settings .= '<p>' . __('<strong>Discussion</strong> - You can turn comments and pings on or off, and if there are comments on the post, you can see them here and moderate them.') . '</p>';
//	
//		get_current_screen()->add_help_tab( array(
//			'id'      => 'discussion-settings',
//			'title'   => __('Discussion Settings'),
//			'content' => $discussion_settings,
//		) );
//	
//		get_current_screen()->set_help_sidebar(
//				'<p>' . sprintf(__('You can also create posts with the <a href="%s">Press This bookmarklet</a>.'), 'options-writing.php') . '</p>' .
//				'<p><strong>' . __('For more information:') . '</strong></p>' .
//				'<p>' . __('<a href="http://codex.wordpress.org/Posts_Add_New_Screen" target="_blank">Documentation on Writing and Editing Posts</a>') . '</p>' .
//				'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
//		);
	}else{
		
	}
}

function admin_new_prodauct_header(){

	$wp_version = get_bloginfo('version');
	if (version_compare($wp_version, '3.4-beta3', '<'))
		return;
	
	$customize_display = '<p>' . __('The title field and the big Post Editing Area are fixed in place, but you can reposition all the other boxes using drag and drop, and can minimize or expand them by clicking the title bar of each box. Use the Screen Options tab to unhide more boxes (Excerpt, Send Trackbacks, Custom Fields, Discussion, Slug, Author) or to choose a 1- or 2-column layout for this screen.') . '</p>';

	get_current_screen()->add_help_tab( array(
		'id'      => 'customize-display',
		'title'   => __('Customizing This Display'),
		'content' => $customize_display,
	) );
//
//	$title_and_editor  = '<p>' . __('<strong>Title</strong> - Enter a title for your post. After you enter a title, you&#8217;ll see the permalink below, which you can edit.') . '</p>';
//	$title_and_editor .= '<p>' . __('<strong>Post editor</strong> - Enter the text for your post. There are two modes of editing: Visual and HTML. Choose the mode by clicking on the appropriate tab. Visual mode gives you a WYSIWYG editor. Click the last icon in the row to get a second row of controls. The HTML mode allows you to enter raw HTML along with your post text. You can insert media files by clicking the icons above the post editor and following the directions. You can go to the distraction-free writing screen via the Fullscreen icon in Visual mode (second to last in the top row) or the Fullscreen button in HTML mode (last in the row). Once there, you can make buttons visible by hovering over the top area. Exit Fullscreen back to the regular post editor.') . '</p>';
//
//	get_current_screen()->add_help_tab( array(
//		'id'      => 'title-post-editor',
//		'title'   => __('Title and Post Editor'),
//		'content' => $title_and_editor,
//	) );
//
//	$publish_box = '<p>' . __('<strong>Publish</strong> - You can set the terms of publishing your post in the Publish box. For Status, Visibility, and Publish (immediately), click on the Edit link to reveal more options. Visibility includes options for password-protecting a post or making it stay at the top of your blog indefinitely (sticky). Publish (immediately) allows you to set a future or past date and time, so you can schedule a post to be published in the future or backdate a post.') . '</p>';
//
//	if ( current_theme_supports( 'post-formats' ) && post_type_supports( 'post', 'post-formats' ) ) {
//		$publish_box .= '<p>' . __( '<strong>Post Format</strong> - This designates how your theme will display a specific post. For example, you could have a <em>standard</em> blog post with a title and paragraphs, or a short <em>aside</em> that omits the title and contains a short text blurb. Please refer to the Codex for <a href="http://codex.wordpress.org/Post_Formats#Supported_Formats">descriptions of each post format</a>. Your theme could enable all or some of 10 possible formats.' ) . '</p>';
//	}
//
//	if ( current_theme_supports( 'post-thumbnails' ) && post_type_supports( 'post', 'thumbnail' ) ) {
//		$publish_box .= '<p>' . __('<strong>Featured Image</strong> - This allows you to associate an image with your post without inserting it. This is usually useful only if your theme makes use of the featured image as a post thumbnail on the home page, a custom header, etc.') . '</p>';
//	}
//
//	get_current_screen()->add_help_tab( array(
//		'id'      => 'publish-box',
//		'title'   => __('Publish Box'),
//		'content' => $publish_box,
//	) );
//
//	$discussion_settings  = '<p>' . __('<strong>Send Trackbacks</strong> - Trackbacks are a way to notify legacy blog systems that you&#8217;ve linked to them. Enter the URL(s) you want to send trackbacks. If you link to other WordPress sites they&#8217;ll be notified automatically using pingbacks, and this field is unnecessary.') . '</p>';
//	$discussion_settings .= '<p>' . __('<strong>Discussion</strong> - You can turn comments and pings on or off, and if there are comments on the post, you can see them here and moderate them.') . '</p>';
//
//	get_current_screen()->add_help_tab( array(
//		'id'      => 'discussion-settings',
//		'title'   => __('Discussion Settings'),
//		'content' => $discussion_settings,
//	) );
//
//	get_current_screen()->set_help_sidebar(
//			'<p>' . sprintf(__('You can also create posts with the <a href="%s">Press This bookmarklet</a>.'), 'options-writing.php') . '</p>' .
//			'<p><strong>' . __('For more information:') . '</strong></p>' .
//			'<p>' . __('<a href="http://codex.wordpress.org/Posts_Add_New_Screen" target="_blank">Documentation on Writing and Editing Posts</a>') . '</p>' .
//			'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
//	);
}

function usces_clear_quickcharge( $id ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'usces_member_meta';
//$wpdb->show_errors();
	$query = $wpdb->prepare( "DELETE FROM $table_name WHERE meta_key = %s", $id );
	$res = $wpdb->query( $query );

	return $res;
}

function usces_admin_action_status( $status = '', $message = '' ) {
	global $usces;
	if( empty($status) ) {
		$status = $usces->action_status;
		$usces->action_status = 'none';
	}
	if( empty($message) ) {
		$message = $usces->action_message;
		$usces->action_message = '';
	}
	$class = '';
	if( $status == 'success' ) {
		$class = 'updated';
	} elseif( $status == 'caution' ) {
		$class = 'update-nag';
	} elseif( $status == 'error' ) {
		$class = 'error';
	}
	if( '' != $class ) {
?>
<div id="usces_admin_status">
	<div id="usces_action_status" class="<?php echo $class; ?> notice is-dismissible">
		<p><strong><?php echo $message; ?></strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.' ); ?></span></button>
	</div>
</div>
<?php
	} else {
?>
<div id="usces_admin_status"></div>
<?php
	}
}

function usces_get_admin_script_message() {
	$mes_str = "";
	$message = array();
	$message[] = 'オプション名を入力してください。';//0
	$message[] = '同じ名前のオプションが存在します。';//1
	$message[] = 'セレクト値を入力してください。';//2
	$message[] = 'テキスト、テキストエリアの場合はセレクト値を空白にしてください。';//3
	$message[] = 'SKUコードの値を入力してください。';//4
	$message[] = '売価の値を入力してください。';//5
	$message[] = 'SKUコードは半角英数（-_を含む）で入力してください。';//6
	$message[] = '通常価は数値で入力してください。';//7
	$message[] = '売価は数値で入力してください。';//8
	$message[] = '在庫数は数値で入力してください。';//9
	$message[] = '同じSKUコードが存在します。';//10
	$message[] = '支払方法名の値を入力してください。';//11
	$message[] = '決済種別を選択してください。';//12
	$message[] = '決済モジュールの値を入力してください。';//13
	$message[] = '同じ支払方法名が存在します。';//14
	$message[] = 'を選択してください';//15
	$message[] = 'を入力してください';//16
	$message[] = '数値で入力してください。';//17
	$message[] = '削除';//18
	$message[] = __( 'Dismiss this notice.' );//19
	$message[] = '～';//20
	$message = apply_filters( 'usces_filter_admin_script_message', $message );
	foreach( (array)$message as $key => $mes ) {
		$mes_str .= "'".$mes."',";
	}
	$mes_str = rtrim( $mes_str, "," );
	return $mes_str;
}
?>
