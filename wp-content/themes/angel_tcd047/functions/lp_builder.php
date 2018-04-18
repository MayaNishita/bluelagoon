<?php

/**
 * 管理画面css読み込み設定
 */
function lp_builder_admin_styles() {
	wp_enqueue_style( 'lp_builder', get_template_directory_uri() . '/admin/css/lp_builder.css', array(), version_num() );
}
add_action( 'admin_print_styles', 'lp_builder_admin_styles', 11 );

/**
 * メタボックス追加
 */
function lp_builder_add_meta_boxes() {
	global $pagenow, $typenow, $post;

	// LPメタボックス追加
	add_meta_box(
		'lp_builder_meta_box',
		__( 'Landing page builder', 'tcd-w' ),
		'lp_builder_show_meta_box',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'lp_builder_add_meta_boxes' );

/**
 * メタボックス表示
 */
function lp_builder_show_meta_box() {
	global $post;

	// js
	wp_enqueue_script( 'lp_builder', get_template_directory_uri() . '/admin/js/lp_builder.js', array( 'jquery', 'jquery-ui-sortable' ), version_num(), true );
	wp_localize_script( 'lp_builder', 'lp_builder_setting', array(
		'meta_box_id' => 'lp_builder_meta_box',
		// 固定ページテンプレート「ランディングページ」のファイルパス
		'page_template_lp_slug' => 'page-templates/lp.php',
		// 固定ページテンプレート「ランディングページ」選択時に非表示にするメタボックスのjQueryセレクタ
		'toggle_metaboxes_selector' => '#postdivrich, #tcd_profile_template'
	) );

	$data = get_post_meta( $post->ID, 'lp_builder', true );

	// nonce
	echo '<input type="hidden" name="lp_builder_nonce" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';

	echo '<div class="lp_builder_message">';
	_e( '<p>You can build contents freely with this function.</p><p>FIRST STEP: Click Add content button.<br />SECOND STEP: Select content from dropdown menu to show on each column.</p><p>You can change row by dragging MOVE button and you can delete row by clicking DELETE button.</p>', 'tcd-w' );
	echo '</div>';
?>

<div id="lp_builder_wrap">
	<div id="lp_builder" data-delete-confirm="<?php _e( 'Are you sure you want to delete this content?', 'tcd-w' ); ?>" data-content-rows="<?php echo ( ! empty( $data ) && is_array( $data ) ) ? count( $data ) : 0; ?>">
<?php
	if ( ! empty( $data ) && is_array( $data ) ) {
		foreach( $data as $key => $content ) {
			$lpb_index = 'lpb_' . $key;
?>
		<div class="lpb_row">
			<ul class="lpb_button cf">
				<li><span class="lpb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
				<li><span class="lpb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
			</ul>
			<div class="lpb_column_area">
				<div class="lpb_column">
					<input type="hidden" class="lpb_index" value="<?php echo $lpb_index; ?>">
					<?php the_lp_builder_content_select( $lpb_index, $content['lpb_content_select'] ); ?>
					<?php if ( ! empty( $content['lpb_content_select'] ) ) the_lp_builder_content_setting( $lpb_index, $content['lpb_content_select'], $content ); ?>
				</div>
			</div>
		</div>
<?php
		}
	}
?>
	</div>
	<div id="lpb_add_row_buttton_area">
		<input type="button" value="<?php echo __( 'Add content', 'tcd-w' ); ?>" class="button-secondary add_row_buttton">
	</div>
</div>

<?php // LPビルダー追加用 非表示 ?>
<div id="lp_builder-clone" class="hidden">
	<div class="lpb_row">
		<ul class="lpb_button cf">
			<li><span class="lpb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
			<li><span class="lpb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
		</ul>
		<div class="lpb_column_area">
			<div class="lpb_column">
				<input type="hidden" class="lpb_index" value="lpb_content_cloneindex">
				<?php the_lp_builder_content_select( 'lpb_content_cloneindex' ); ?>
			</div>
		</div>
	</div>
<?php
	// キャッチフレーズと説明文
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'catch_and_desc' );

	// 画像
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'image' );

	// 枠付きボックスコンテンツ
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'border_box' );

	// 参加者の声
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'voice' );

	// 概要表
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'summary_table' );

	// アクセス
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'access' );

	// リンクボタン
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'link_button' );

	// フリースペース
	the_lp_builder_content_setting( 'lpb_content_cloneindex', 'wysiwyg' );
?>
</div><!-- END #lp_builder-clone.hidden -->
<?php
}

/**
 * メタボックス保存
 */
function lp_builder_save_meta_box( $post_id ) {
	// verify nonce
	if ( ! isset( $_POST['lp_builder_nonce'] ) || ! wp_verify_nonce( $_POST['lp_builder_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// save
	$old = get_post_meta( $post_id, 'lp_builder', true );
	$new = array();

	if ( !empty( $_POST['lp_builder'] ) ) {
		$data = stripslashes_deep( $_POST['lp_builder'] );

		foreach( $data as $key => $value ) {
			// クローン用は何もしない
			if ( $key == 'lpb_content_cloneindex' ) continue;

			// 保存値整形
			$value = lp_builder_save_content_value( $value );

			if ( $value ) {
				$new[] = $value;
			}
		}
	}

	if ( $new ) {
		update_post_meta( $post_id, 'lp_builder', $new );
	} elseif ( $old ) {
		delete_post_meta( $post_id, 'lp_builder' );
	}

	return $post_id;
}
add_action( 'save_post', 'lp_builder_save_meta_box' );


/**
 * LPビルダー コンテンツ選択プルダウン出力
 */
function the_lp_builder_content_select( $lpb_index = 'lpb_content_cloneindex', $selected = null ) {
	$lpb_content_select = array(
		'catch_and_desc' => __( 'Catchphrase and description', 'tcd-w' ),
		'image' => __( 'Image', 'tcd-w' ),
        'border_box' => __( 'List box with frame', 'tcd-w' ),
        'voice' => __( 'User voice', 'tcd-w' ),
        'summary_table' => __( 'Summary table', 'tcd-w' ),
		'access' => __( 'Access', 'tcd-w' ),
		'link_button' => __( 'Link button', 'tcd-w' ),
		'wysiwyg' => __( 'WYSIWYG Editor', 'tcd-w' )
	);

	if ( $selected && isset( $lpb_content_select[$selected] ) ) {
		$add_class = ' hidden';
	} else {
		$add_class = '';
	}

	$out = '<select name="lp_builder[' . esc_attr( $lpb_index ) . '][lpb_content_select]" class="lpb_content_select' . $add_class . '">';
	$out .= '<option value="">' . __( 'Choose the content', 'tcd-w' ) . '</option>';

	foreach( $lpb_content_select as $key => $value ) {
		$attr = '';
		if ( $key == $selected ) {
			$attr = ' selected="selected"';
		}
		$out .= '<option value="' . esc_attr( $key ) . '"' . $attr . '>' . esc_html( $value ) . '</option>';
	}

	$out .= '</select>';

	echo $out;
}

/**
 * LPビルダー コンテンツ設定出力
 */
function the_lp_builder_content_setting( $lpb_index = 'lpb_content_cloneindex', $lpb_content_select = null, $value = array() ) {
	$options = get_desing_plus_option();

	// フォントタイプ
	$font_family_options = array(
		'type1' => __( 'Meiryo', 'tcd-w' ),
		'type2' => __( 'YuGothic', 'tcd-w' ),
		'type3' => __( 'YuMincho', 'tcd-w' ),
	);
?>
<div class="lpb_content_wrap lpb_content_wrap-<?php echo esc_attr( $lpb_content_select ); ?> cf">
<?php
	// キャッチフレーズと説明文
	if ( $lpb_content_select == 'catch_and_desc' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_catch_and_desc_headline' => '',
			'lpb_catch_and_desc_headline_font_size' => 30,
			'lpb_catch_and_desc_headline_font_size_mobile' => 20,
			'lpb_catch_and_desc_headline_color' => $options['pickedcolor1'],
			'lpb_catch_and_desc_headline_font_family' => 'type1',
			'lpb_catch_and_desc_desc' => '',
			'lpb_catch_and_desc_desc_font_size' => 14,
			'lpb_catch_and_desc_desc_font_size_mobile' => 14,
			'lpb_catch_and_desc_desc_font_family' => 'type1'
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'Catchphrase and description', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
		<textarea rows="2" class="large-text change_content_headline" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_headline]"><?php echo esc_textarea( $value['lpb_catch_and_desc_headline'] ); ?></textarea>
		<ul>
			<li><?php _e( 'Font size', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_headline_font_size]" value="<?php echo esc_attr( $value['lpb_catch_and_desc_headline_font_size'] ); ?>"><span>px</span></li>
			<li><?php _e( 'Font size for mobile_mobile', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_headline_font_size_mobile]" value="<?php echo esc_attr( $value['lpb_catch_and_desc_headline_font_size_mobile'] ); ?>"><span>px</span></li>
			<li>
				<?php _e( 'Font color', 'tcd-w' ); ?> <input type="text" id="lpb_catch_and_desc_headline_color-<?php echo $lpb_index; ?>" class="color" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_headline_color]" value="<?php echo esc_attr( $value['lpb_catch_and_desc_headline_color'] ); ?>" />
				<input type="button" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('lpb_catch_and_desc_headline_color-<?php echo $lpb_index; ?>').color.fromString('<?php echo esc_attr( $options['pickedcolor1'] ); ?>')">
			</li>
			<li>
				<?php _e( 'Font family', 'tcd-w' ); ?>
				<select name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_headline_font_family]">
				<?php
					foreach( $font_family_options as $option_key => $option_value ) :
						echo '<option value="' . esc_attr( $option_key ) . '"' . selected( $option_key , $value['lpb_catch_and_desc_headline_font_family'], false) . '>'.esc_html( $option_value ) . '</option>';
					endforeach;
				?>
				</select>
			</li>
		</ul>
		<h4 class="lpb_content_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
		<textarea rows="4" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_desc]"><?php echo esc_textarea( $value['lpb_catch_and_desc_desc'] ); ?></textarea>
		<ul>
			<li><?php _e( 'Font size', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_desc_font_size]" value="<?php echo esc_attr( $value['lpb_catch_and_desc_desc_font_size'] ); ?>"><span>px</span></li>
			<li><?php _e( 'Font size for mobile_mobile', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_desc_font_size_mobile]" value="<?php echo esc_attr( $value['lpb_catch_and_desc_desc_font_size_mobile'] ); ?>"><span>px</span></li>
			<li>
				<?php _e( 'Font family', 'tcd-w' ); ?>
				<select name="lp_builder[<?php echo $lpb_index; ?>][lpb_catch_and_desc_desc_font_family]">
				<?php
					foreach( $font_family_options as $option_key => $option_value ) :
						echo '<option value="' . esc_attr( $option_key ) . '"' . selected( $option_key , $value['lpb_catch_and_desc_desc_font_family'], false) . '>'.esc_html( $option_value ) . '</option>';
					endforeach;
				?>
				</select>
			</li>
		</ul>
	</div>

<?php
	// 画像
	} elseif ( $lpb_content_select == 'image' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_image_image' => '',
			'lpb_image_url' => '',
			'lpb_image_target' => 0,
			'lpb_image_show_caption' => 0,
			'lpb_image_catch' => '',
			'lpb_image_catch_font_size' => 30,
			'lpb_image_catch_font_size_mobile' => 20,
			'lpb_image_catch_font_family' => 'type1',
			'lpb_image_catch_color' => 'FFFFFF',
			'lpb_image_catch_shadow_a' => 0,
			'lpb_image_catch_shadow_b' => 0,
			'lpb_image_catch_shadow_c' => 4,
			'lpb_image_catch_shadow_color' => '000000',
			'lpb_image_catch2' => '',
			'lpb_image_catch2_font_size' => 20,
			'lpb_image_catch2_font_size_mobile' => 16,
			'lpb_image_catch2_font_family' => 'type1',
			'lpb_image_catch2_color' => 'FFFFFF',
			'lpb_image_catch2_shadow_a' => 0,
			'lpb_image_catch2_shadow_b' => 0,
			'lpb_image_catch2_shadow_c' => 4,
			'lpb_image_catch2_shadow_color' => '000000'
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'Image', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js">
				<input type="hidden" value="<?php echo esc_attr( $value['lpb_image_image'] ); ?>" id="lpb_image_image-<?php echo $lpb_index; ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $value['lpb_image_image'] ) { echo wp_get_attachment_image( $value['lpb_image_image'], 'medium' ); } ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $value['lpb_image_image'] ) { echo 'hidden'; } ?>">
				</div>
			</div>
		</div>
		<h4 class="lpb_content_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
		<input class="large-text" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_url]" value="<?php echo esc_attr( $value['lpb_image_url'] ); ?>">
		<p><label><input type="checkbox" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_target]" value="1" <?php checked( 1, $value['lpb_image_target'] ); ?>><?php _e( 'Open a URL in a new window', 'tcd-w' ); ?></label></p>

        <h4 class="lpb_content_headline2"><?php _e( 'Caption display on image', 'tcd-w' ); ?></h4>
        <p><label><input type="checkbox" class="lpb_image_show_caption" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_show_caption]" value="1" <?php checked( 1, $value['lpb_image_show_caption'] ); ?>><?php _e( 'Display caption on image', 'tcd-w' ); ?></label></p>
		<div class="lpb_image_catch_wrap"<?php if ( $value['lpb_image_show_caption'] != '1' ) echo ' style="display:none;"'; ?>>
            <h4 class="lpb_content_headline2"><?php _e( 'Catch copy', 'tcd-w' ); ?></h4>
			<textarea rows="2" class="large-text change_content_headline" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch]"><?php echo esc_textarea( $value['lpb_image_catch'] ); ?></textarea>
			<ul>
				<li><?php _e( 'Font size', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_font_size]" value="<?php echo esc_attr( $value['lpb_image_catch_font_size'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Font size for mobile', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_font_size_mobile]" value="<?php echo esc_attr( $value['lpb_image_catch_font_size_mobile'] ); ?>"><span>px</span></li>
				<li>
					<?php _e( 'Font color', 'tcd-w' ); ?> <input type="text" id="lpb_image_catch_color-<?php echo $lpb_index; ?>" class="color" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_color]" value="<?php echo esc_attr( $value['lpb_image_catch_color'] ); ?>" />
					<input type="button" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('lpb_image_catch_color-<?php echo $lpb_index; ?>').color.fromString('FFFFFF')">
				</li>
				<li>
					<?php _e( 'Font family', 'tcd-w' ); ?>
					<select name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_font_family]">
					<?php
						foreach( $font_family_options as $option_key => $option_value ) :
							echo '<option value="' . esc_attr( $option_key ) . '"' . selected( $option_key , $value['lpb_image_catch_font_family'], false) . '>'.esc_html( $option_value ) . '</option>';
						endforeach;
					?>
					</select>
				</li>
				<li><?php _e( 'Dropshadow position (left)', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_shadow_a]" value="<?php echo esc_attr( $value['lpb_image_catch_shadow_a'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Dropshadow position (top)', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_shadow_b]" value="<?php echo esc_attr( $value['lpb_image_catch_shadow_b'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Dropshadow size', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_shadow_c]" value="<?php echo esc_attr( $value['lpb_image_catch_shadow_c'] ); ?>"><span>px</span></li>
				<li>
					<?php _e( 'Dropshadow color', 'tcd-w' );  ?> <input type="text" id="lpb_image_catch_shadow_color-<?php echo $lpb_index; ?>" class="color" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch_shadow_color]" value="<?php echo esc_attr( $value['lpb_image_catch_shadow_color'] ); ?>" />
					<input type="button" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('lpb_image_catch_shadow_color-<?php echo $lpb_index; ?>').color.fromString('FFFFFF')">
				</li>
			</ul>
			<h4 class="lpb_content_headline2"><?php _e( 'Sub copy', 'tcd-w' ); ?></h4>
			<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2]"><?php echo esc_textarea( $value['lpb_image_catch2'] ); ?></textarea>
			<ul>
				<li><?php _e( 'Font size', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_font_size]" value="<?php echo esc_attr( $value['lpb_image_catch2_font_size'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Font size for mobile', 'tcd-w' ); ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_font_size_mobile]" value="<?php echo esc_attr( $value['lpb_image_catch2_font_size_mobile'] ); ?>"><span>px</span></li>
				<li>
					<?php _e( 'Font color', 'tcd-w' ); ?> <input type="text" id="lpb_image_catch2_color-<?php echo $lpb_index; ?>" class="color" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_color]" value="<?php echo esc_attr( $value['lpb_image_catch2_color'] ); ?>" />
					<input type="button" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('lpb_image_catch2_color-<?php echo $lpb_index; ?>').color.fromString('FFFFFF')">
				</li>
				<li>
					<?php _e( 'Font family', 'tcd-w' ); ?>
					<select name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_font_family]">
					<?php
						foreach( $font_family_options as $option_key => $option_value ) :
							echo '<option value="' . esc_attr( $option_key ) . '"' . selected( $option_key , $value['lpb_image_catch2_font_family'], false) . '>'.esc_html( $option_value ) . '</option>';
						endforeach;
					?>
					</select>
				</li>
				<li><?php _e( 'Dropshadow position (left)', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_shadow_a]" value="<?php echo esc_attr( $value['lpb_image_catch2_shadow_a'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Dropshadow position (top)', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_shadow_b]" value="<?php echo esc_attr( $value['lpb_image_catch2_shadow_b'] ); ?>"><span>px</span></li>
				<li><?php _e( 'Dropshadow size', 'tcd-w' );  ?> <input class="font_size hankaku" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_shadow_c]" value="<?php echo esc_attr( $value['lpb_image_catch2_shadow_c'] ); ?>"><span>px</span></li>
				<li>
					<?php _e( 'Dropshadow color', 'tcd-w' );  ?> <input type="text" id="lpb_image_catch2_shadow_color-<?php echo $lpb_index; ?>" class="color" name="lp_builder[<?php echo $lpb_index; ?>][lpb_image_catch2_shadow_color]" value="<?php echo esc_attr( $value['lpb_image_catch2_shadow_color'] ); ?>" />
					<input type="button" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('lpb_image_catch2_shadow_color-<?php echo $lpb_index; ?>').color.fromString('FFFFFF')">
				</li>
			</ul>
		</div>
	</div>

<?php
	// 枠付きボックスコンテンツ
	} elseif ( $lpb_content_select == 'border_box' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_border_box_headline' => '',
			'lpb_border_box_desc1' => '',
			'lpb_border_box_desc2' => ''
		), $value );
?>
    <h3 class="lpb_content_headline"><?php _e( 'List box with frame', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
		<input class="large-text change_content_headline" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_border_box_headline]" value="<?php echo esc_attr( $value['lpb_border_box_headline'] ); ?>">
        <h4 class="lpb_content_headline2"><?php _e( 'Contents of left column', 'tcd-w' ); ?></h4>
		<textarea rows="4" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_border_box_desc1]"><?php echo esc_textarea( $value['lpb_border_box_desc1'] ); ?></textarea>
        <h4 class="lpb_content_headline2"><?php _e( 'Contents of right column', 'tcd-w' ); ?></h4>
		<textarea rows="4" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_border_box_desc2]"><?php echo esc_textarea( $value['lpb_border_box_desc2'] ); ?></textarea>
	</div>

<?php
	// 参加者の声
	} elseif ( $lpb_content_select == 'voice' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_voice_headline' => '',
			'lpb_voice_items' => array()
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'User voice', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
		<input class="large-text change_content_headline" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_headline]" value="<?php echo esc_attr( $value['lpb_voice_headline'] ); ?>">

		<div class="lpb_table_repeater_wrapper">
			<table class="lpb_table_repeater lpb_table_repeater-sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
				<thead>
					<tr>
						<th><?php _e( 'User voice', 'tcd-w' ); ?></th>
						<th class="col-delete"></th>
					</tr>
				</thead>
				<tbody>
<?php
		if ( $value['lpb_voice_items'] && is_array( $value['lpb_voice_items'] ) ) {
			foreach ( $value['lpb_voice_items'] as $repeater_key => $repeater_value ) {
				// デフォルト値に入力値をマージ
				$repeater_value = array_merge( array(
					'image' => '',
					'name' => '',
					'comment' => ''
				), $repeater_value );
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td class="lpb_voice_item">
							<label><?php _e( 'Image', 'tcd-w' ); ?></label>
							<div class="cf cf_media_field image_box hide-if-no-js">
								<input type="hidden" value="<?php echo esc_attr( $repeater_value['image'] ); ?>" id="lpb_voice_item-image-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][image][]" class="cf_media_id">
								<div class="preview_field"><?php if ( $repeater_value['image'] ) { echo wp_get_attachment_image( $repeater_value['image'], 'medium' ); } ?></div>
								<div class="button_area">
									<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
									<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $repeater_value['image'] ) { echo 'hidden'; } ?>">
								</div>
							</div>
							<p>
                                <label for="lpb_voice_item-name-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>"><?php _e( 'Name, occupation, etc.', 'tcd-w' ); ?></label>
								<textarea rows="2" class="large-text" id="lpb_voice_item-name-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][name][]"><?php echo esc_textarea( $repeater_value['name'] ); ?></textarea>
							</p>
							<p>
                                <label for="lpb_voice_item-comment-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>"><?php _e( 'Impression statement', 'tcd-w' ); ?></label>
								<textarea rows="4" class="large-text" id="lpb_voice_item-comment-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][comment][]"><?php echo esc_textarea( $repeater_value['comment'] ); ?></textarea>
							</p>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
			}
		}

		$repeater_key = 'repeater_addindex';
		$repeater_value = array(
			'image' => '',
			'name' => '',
			'comment' => ''
		);
		ob_start();
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td>
							<label><?php _e( 'Image', 'tcd-w' ); ?></label>
							 <p><?php _e( 'Recommend image size. Width:120px, Height:120px', 'tcd-w' ); ?></p>
							<div class="cf cf_media_field hide-if-no-js">
								<input type="hidden" value="<?php echo esc_attr( $repeater_value['image'] ); ?>" id="lpb_voice_item-image-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][image][]" class="cf_media_id">
								<div class="preview_field"><?php if ( $repeater_value['image'] ) { echo wp_get_attachment_image( $repeater_value['image'], 'medium' ); } ?></div>
								<div class="button_area">
									<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
									<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $repeater_value['image'] ) { echo 'hidden'; } ?>">
								</div>
							</div>
							<p>
                                <label for="lpb_voice_item-name-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>"><?php _e( 'Name, occupation, etc.', 'tcd-w' ); ?></label>
								<textarea rows="2" class="large-text" id="lpb_voice_item-name-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][name][]"><?php echo esc_textarea( $repeater_value['name'] ); ?></textarea>
							</p>
							<p>
                                <label for="lpb_voice_item-comment-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>"><?php _e( 'Impression statement', 'tcd-w' ); ?></label>
								<textarea rows="4" class="large-text" id="lpb_voice_item-comment-<?php echo $lpb_index; ?>-<?php echo esc_attr( $repeater_key ); ?>" name="lp_builder[<?php echo $lpb_index; ?>][lpb_voice_items][comment][]"><?php echo esc_textarea( $repeater_value['comment'] ); ?></textarea>
							</p>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
		$clone = ob_get_clean();
?>
				</tbody>
			</table>
			<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>

		</div>
	</div>

<?php
	// 概要表
	} elseif ( $lpb_content_select == 'summary_table' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_summary_table_headline' => '',
			'lpb_summary_table_items' => array()
		), $value );
?>
    <h3 class="lpb_content_headline"><?php _e( 'Summary table', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
		<input class="large-text change_content_headline" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_summary_table_headline]" value="<?php echo esc_attr( $value['lpb_summary_table_headline'] ); ?>">

		<div class="lpb_table_repeater_wrapper">
			<table class="lpb_table_repeater" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
				<thead>
					<tr>
						<th class="col-headline"><?php _e( 'Summary', 'tcd-w' ); ?></th>
                        <th class="col-desc"><?php _e( 'Details', 'tcd-w' ); ?></th>
						<th class="col-delete"></th>
					</tr>
				</thead>
				<tbody>
<?php
		if ( $value['lpb_summary_table_items'] && is_array( $value['lpb_summary_table_items'] ) ) {
			foreach ( $value['lpb_summary_table_items'] as $repeater_key => $repeater_value ) {
				// デフォルト値に入力値をマージ
				$repeater_value = array_merge( array(
					'headline' => '',
					'desc' => ''
				), $repeater_value );
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_summary_table_items][headline][]"><?php echo esc_textarea( $repeater_value['headline'] ); ?></textarea>
						</td>
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_summary_table_items][desc][]"><?php echo esc_textarea( $repeater_value['desc'] ); ?></textarea>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
			}
		}

		$repeater_key = 'repeater_addindex';
		$repeater_value = array(
			'headline' => '',
			'desc' => ''
		);
		ob_start();
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_summary_table_items][headline][]"><?php echo esc_textarea( $repeater_value['headline'] ); ?></textarea>
						</td>
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_summary_table_items][desc][]"><?php echo esc_textarea( $repeater_value['desc'] ); ?></textarea>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
		$clone = ob_get_clean();
?>
				</tbody>
			</table>
			<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>

		</div>
	</div>

<?php
	// アクセス
	} elseif ( $lpb_content_select == 'access' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_access_headline' => '',
			'lpb_access_map_type' => 'type1',
			'lpb_access_map_code1' => '',
			'lpb_access_map_code2' => '',
			'lpb_access_items' => array()
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'Access', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
		<input class="large-text change_content_headline" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_headline]" value="<?php echo esc_attr( $value['lpb_access_headline'] ); ?>">
		<h4 class="lpb_content_headline2"><?php _e( 'Google maps type', 'tcd-w' ); ?></h4>
		<label><input type="radio" class="lpb_access_map_type" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_map_type]" value="type1"<?php if ( $value['lpb_access_map_type'] == 'type1' ) echo ' checked="checked"'; ?>> <?php _e( 'Use Google map iframe code', 'tcd-w' ); ?></label><br />
		<label><input type="radio" class="lpb_access_map_type" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_map_type]" value="type2"<?php if ( $value['lpb_access_map_type'] == 'type2' ) echo ' checked="checked"'; ?>> <?php _e( 'Use TCD Google Maps plugin', 'tcd-w' ); ?></label>
		<div class="lpb_access_map_type1_wrap"<?php if ( $value['lpb_access_map_type'] != 'type1' ) echo ' display:none;"'; ?>>
			<h4 class="lpb_content_headline2"><?php _e( 'Google map iframe code', 'tcd-w' ); ?></h4>
            <p><?php _e( 'Paste the iframe code of Google maps', 'tcd-w' ); ?></p>
			<textarea rows="4" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_map_code1]"><?php echo esc_textarea( $value['lpb_access_map_code1'] ); ?></textarea>
		</div>
		<div class="lpb_access_map_type2_wrap"<?php if ( $value['lpb_access_map_type'] != 'type2' ) echo ' style="display:none;"'; ?>>
			<h4 class="lpb_content_headline2"><?php _e( 'TCD Google Maps plugin short code', 'tcd-w' ); ?></h4>
			<p><?php _e( 'Copy and paste TCD Google Maps plugin short code here', 'tcd-w' ); ?></p>
			<textarea rows="4" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_map_code2]"><?php echo esc_textarea( $value['lpb_access_map_code2'] ); ?></textarea>
		</div>

		<div class="lpb_table_repeater_wrapper">
			<table class="lpb_table_repeater" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
				<thead>
					<tr>
                        <th class="col-headline"><?php _e( 'Supplementary information', 'tcd-w' ); ?></th>
						<th class="col-desc"><?php _e( 'Details', 'tcd-w' ); ?></th>
						<th class="col-delete"></th>
					</tr>
				</thead>
				<tbody>
<?php
		if ( $value['lpb_access_items'] && is_array( $value['lpb_access_items'] ) ) {
			foreach ( $value['lpb_access_items'] as $repeater_key => $repeater_value ) {
				// デフォルト値に入力値をマージ
				$repeater_value = array_merge( array(
					'headline' => '',
					'desc' => ''
				), $repeater_value );
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_items][headline][]"><?php echo esc_textarea( $repeater_value['headline'] ); ?></textarea>
						</td>
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_items][desc][]"><?php echo esc_textarea( $repeater_value['desc'] ); ?></textarea>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
			}
		}

		$repeater_key = 'repeater_addindex';
		$repeater_value = array(
			'headline' => '',
			'desc' => ''
		);
		ob_start();
?>
					<tr class="lpb_table_repeater_item-<?php echo esc_attr( $repeater_key ); ?>">
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_items][headline][]"><?php echo esc_textarea( $repeater_value['headline'] ); ?></textarea>
						</td>
						<td>
							<textarea rows="2" class="large-text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_access_items][desc][]"><?php echo esc_textarea( $repeater_value['desc'] ); ?></textarea>
						</td>
						<td class="col-delete">
							<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
						</td>
					</tr>
<?php
		$clone = ob_get_clean();
?>
				</tbody>
			</table>
			<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>

		</div>
	</div>

<?php
	// リンクボタン
	} elseif ( $lpb_content_select == 'link_button' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_link_button_text' => '',
			'lpb_link_button_url' => '',
			'lpb_link_button_target' => 0
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'Link button', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>

		<h4 class="lpb_content_headline2"><?php _e( 'Button label', 'tcd-w' ); ?></h4>
		<input class="large-text change_content_headline" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_link_button_text]" value="<?php echo esc_attr( $value['lpb_link_button_text'] ); ?>">
		<h4 class="lpb_content_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
		<input class="large-text" type="text" name="lp_builder[<?php echo $lpb_index; ?>][lpb_link_button_url]" value="<?php echo esc_attr( $value['lpb_link_button_url'] ); ?>">
		<p><label><input type="checkbox" name="lp_builder[<?php echo $lpb_index; ?>][lpb_link_button_target]" value="1" <?php checked( 1, $value['lpb_link_button_target'] ); ?>><?php _e( 'Open a URL in a new window', 'tcd-w' ); ?></label></p>
	</div>

<?php
	// フリーススペース
	} elseif ( $lpb_content_select == 'wysiwyg' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_wysiwyg_editor' => ''
		), $value );
?>
	<h3 class="lpb_content_headline"><?php _e( 'WYSIWYG editor', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
		<?php if ( preg_match( '/^lpb_\d+$/', $lpb_index ) ) : ?>
		<div class="lp_builder_message">
			<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
			<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" class="lpb_content_id" value="<?php echo $lpb_index; ?>"></p>
		</div>
		<?php endif; ?>
		<?php wp_editor( $value['lpb_wysiwyg_editor'], 'lpb_wysiwyg_editor_' . $lpb_index, array( 'textarea_name' => 'lp_builder[' . $lpb_index . '][lpb_wysiwyg_editor]', 'textarea_rows' => 10, 'editor_class' => 'change_content_headline' ) ); ?>	</div>

<?php
	} else {
?>
	<h3 class="lpb_content_headline"><?php echo esc_html( $lpb_content_select ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
	<div class="lpb_content">
	</div>
<?php
	}
?>

</div><!-- END .lpb_content_wrap -->
<?php
}

/**
 * LPビルダー 保存値整形
 */
function lp_builder_save_content_value( $value ) {
	if ( empty( $value ) || empty( $value['lpb_content_select'] ) ) return false;

	$options = get_desing_plus_option();

	// キャッチフレーズと説明文
	if ( $value['lpb_content_select'] == 'catch_and_desc' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_catch_and_desc_headline' => '',
			'lpb_catch_and_desc_headline_font_size' => 30,
			'lpb_catch_and_desc_headline_font_size_mobile' => 20,
			'lpb_catch_and_desc_headline_color' => $options['pickedcolor1'],
			'lpb_catch_and_desc_headline_font_family' => 'type1',
			'lpb_catch_and_desc_desc' => '',
			'lpb_catch_and_desc_desc_font_size' => 14,
			'lpb_catch_and_desc_desc_font_size_mobile' => 14,
			'lpb_catch_and_desc_desc_font_family' => 'type1'
		), $value );

		$value['lpb_catch_and_desc_headline'] = wp_filter_nohtml_kses( $value['lpb_catch_and_desc_headline'] );
		$value['lpb_catch_and_desc_headline_font_size'] = intval( $value['lpb_catch_and_desc_headline_font_size'] );
		$value['lpb_catch_and_desc_headline_font_size_mobile'] = intval( $value['lpb_catch_and_desc_headline_font_size_mobile'] );
		$value['lpb_catch_and_desc_headline_color'] = wp_filter_nohtml_kses( $value['lpb_catch_and_desc_headline_color'] );
		$value['lpb_catch_and_desc_headline_font_family'] = wp_filter_nohtml_kses( $value['lpb_catch_and_desc_headline_font_family'] );
		$value['lpb_catch_and_desc_desc'] = $value['lpb_catch_and_desc_desc'] ;
		$value['lpb_catch_and_desc_desc_font_size'] = intval( $value['lpb_catch_and_desc_desc_font_size'] );
		$value['lpb_catch_and_desc_desc_font_size_mobile'] = intval( $value['lpb_catch_and_desc_desc_font_size_mobile'] );
		$value['lpb_catch_and_desc_desc_font_family'] = wp_filter_nohtml_kses( $value['lpb_catch_and_desc_desc_font_family'] );

	// 画像
	} elseif ( $value['lpb_content_select'] == 'image' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_image_image' => '',
			'lpb_image_url' => '',
			'lpb_image_target' => 0,
			'lpb_image_show_caption' => 0,
			'lpb_image_catch' => '',
			'lpb_image_catch_font_size' => 30,
			'lpb_image_catch_font_size_mobile' => 20,
			'lpb_image_catch_color' => 'FFFFFF',
			'lpb_image_catch_font_family' => 'type1',
			'lpb_image_catch_shadow_a' => 0,
			'lpb_image_catch_shadow_b' => 0,
			'lpb_image_catch_shadow_c' => 4,
			'lpb_image_catch_shadow_color' => '000000',
			'lpb_image_catch2' => '',
			'lpb_image_catch2_font_size' => 20,
			'lpb_image_catch2_font_size_mobile' => 16,
			'lpb_image_catch2_color' => 'FFFFFF',
			'lpb_image_catch2_font_family' => 'type1',
			'lpb_image_catch2_shadow_a' => 0,
			'lpb_image_catch2_shadow_b' => 0,
			'lpb_image_catch2_shadow_c' => 4,
			'lpb_image_catch2_shadow_color' => '000000'
		), $value );

		$value['lpb_image_image'] = intval( $value['lpb_image_image'] );
		$value['lpb_image_url'] = wp_filter_nohtml_kses( $value['lpb_image_url'] );
		if ( $value['lpb_image_target'] ) $value['lpb_image_target'] = 1;
		if ( $value['lpb_image_show_caption'] ) $value['lpb_image_show_caption'] = 1;
		$value['lpb_image_catch'] = wp_filter_nohtml_kses( $value['lpb_image_catch'] );
		$value['lpb_image_catch_font_size'] = intval( $value['lpb_image_catch_font_size'] );
		$value['lpb_image_catch_font_size_mobile'] = intval( $value['lpb_image_catch_font_size_mobile'] );
		$value['lpb_image_catch_color'] = wp_filter_nohtml_kses( $value['lpb_image_catch_color'] );
		$value['lpb_image_catch_font_family'] = wp_filter_nohtml_kses( $value['lpb_image_catch_font_family'] );
		$value['lpb_image_catch_shadow_a'] = intval( $value['lpb_image_catch_shadow_a'] );
		$value['lpb_image_catch_shadow_b'] = intval( $value['lpb_image_catch_shadow_b'] );
		$value['lpb_image_catch_shadow_c'] = intval( $value['lpb_image_catch_shadow_c'] );
		$value['lpb_image_catch_shadow_color'] = wp_filter_nohtml_kses( $value['lpb_image_catch_shadow_color'] );
		$value['lpb_image_catch2'] = wp_filter_nohtml_kses( $value['lpb_image_catch2'] );
		$value['lpb_image_catch2_font_size'] = intval( $value['lpb_image_catch2_font_size'] );
		$value['lpb_image_catch2_font_size_mobile'] = intval( $value['lpb_image_catch2_font_size_mobile'] );
		$value['lpb_image_catch2_color'] = wp_filter_nohtml_kses( $value['lpb_image_catch2_color'] );
		$value['lpb_image_catch2_font_family'] = wp_filter_nohtml_kses( $value['lpb_image_catch2_font_family'] );
		$value['lpb_image_catch2_shadow_a'] = intval( $value['lpb_image_catch2_shadow_a'] );
		$value['lpb_image_catch2_shadow_b'] = intval( $value['lpb_image_catch2_shadow_b'] );
		$value['lpb_image_catch2_shadow_c'] = intval( $value['lpb_image_catch2_shadow_c'] );
		$value['lpb_image_catch2_shadow_color'] = wp_filter_nohtml_kses( $value['lpb_image_catch2_shadow_color'] );

	// 枠付きボックスコンテンツ
	} elseif ( $value['lpb_content_select'] == 'border_box' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_border_box_headline' => '',
			'lpb_border_box_desc1' => '',
			'lpb_border_box_desc2' => ''
		), $value );

		$value['lpb_border_box_headline'] = wp_filter_nohtml_kses( $value['lpb_border_box_headline'] );
		$value['lpb_border_box_desc1'] = wp_filter_nohtml_kses( $value['lpb_border_box_desc1'] );
		$value['lpb_border_box_desc2'] = wp_filter_nohtml_kses( $value['lpb_border_box_desc2'] );

	// 参加者の声
	} elseif ( $value['lpb_content_select'] == 'voice' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_voice_headline' => '',
			'lpb_voice_items' => array()
		), $value );

		$value['lpb_voice_headline'] = wp_filter_nohtml_kses( $value['lpb_voice_headline'] );

		// リピーター
		$items = $value['lpb_voice_items'];
		$value['lpb_voice_items'] = array();
		if ( isset( $items['image'] ) && is_array( $items['image'] ) ) {
			foreach( array_keys( $items['image'] ) as $key ) {
				// リピーターアイテムデフォルト値
				$item = array(
					'image' => '',
					'name' => '',
					'comment' => ''
				);

				// 入力値
				if ( isset( $items['image'][$key] ) ) {
					$item['image'] = intval( $items['image'][$key] );
				}
				if ( isset( $items['name'][$key] ) ) {
					$item['name'] = wp_filter_nohtml_kses( $items['name'][$key] );
				}
				if ( isset( $items['comment'][$key] ) ) {
					$item['comment'] = wp_filter_nohtml_kses( $items['comment'][$key] );
				}

				// リピーター配列に追加
				$value['lpb_voice_items'][] = $item;
			}
		}

	// 概要表
	} elseif ( $value['lpb_content_select'] == 'summary_table' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_summary_table_headline' => '',
			'lpb_summary_table_items' => array()
		), $value );

		$value['lpb_summary_table_headline'] = wp_filter_nohtml_kses( $value['lpb_summary_table_headline'] );

		// リピーター
		$items = $value['lpb_summary_table_items'];
		$value['lpb_summary_table_items'] = array();
		if ( isset( $items['headline'] ) && is_array( $items['headline'] ) ) {
			foreach( array_keys( $items['headline'] ) as $key ) {
				// リピーターアイテムデフォルト値
				$item = array(
					'headline' => '',
					'desc' => ''
				);

				// 入力値
				if ( isset( $items['headline'][$key] ) ) {
					$item['headline'] = wp_filter_nohtml_kses( $items['headline'][$key] );
				}
				if ( isset( $items['desc'][$key] ) ) {
					$item['desc'] = wp_filter_nohtml_kses( $items['desc'][$key] );
				}

				// リピーター配列に追加
				$value['lpb_summary_table_items'][] = $item;
			}
		}

	// アクセス
	} elseif ( $value['lpb_content_select'] == 'access' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_access_headline' => '',
			'lpb_access_map_type' => 'type1',
			'lpb_access_map_code1' => '',
			'lpb_access_map_code2' => '',
			'lpb_access_items' => array()
		), $value );

		$value['lpb_access_headline'] = wp_filter_nohtml_kses( $value['lpb_access_headline'] );
		$value['lpb_access_map_type'] = wp_filter_nohtml_kses( $value['lpb_access_map_type'] );
		// $value['lpb_access_map_code1'], $value['lpb_access_map_code2'] は何もしない

		// リピーター
		$items = $value['lpb_access_items'];
		$value['lpb_access_items'] = array();
		if ( isset( $items['headline'] ) && is_array( $items['headline'] ) ) {
			foreach( array_keys( $items['headline'] ) as $key ) {
				// リピーターアイテムデフォルト値
				$item = array(
					'headline' => '',
					'desc' => ''
				);

				// 入力値
				if ( isset( $items['headline'][$key] ) ) {
					$item['headline'] = wp_filter_nohtml_kses( $items['headline'][$key] );
				}
				if ( isset( $items['desc'][$key] ) ) {
					$item['desc'] = wp_filter_nohtml_kses( $items['desc'][$key] );
				}

				// リピーター配列に追加
				$value['lpb_access_items'][] = $item;
			}
		}

	// リンクボタン
	} elseif ( $value['lpb_content_select'] == 'link_button' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_link_button_text' => '',
			'lpb_link_button_url' => '',
			'lpb_link_button_target' => 0
		), $value );

		$value['lpb_link_button_text'] = wp_filter_nohtml_kses( $value['lpb_link_button_text'] );
		$value['lpb_link_button_url'] = wp_filter_nohtml_kses( $value['lpb_link_button_url'] );
		if ( $value['lpb_link_button_target'] ) $value['lpb_link_button_target'] = 1;

	// フリースペース
	} elseif ( $value['lpb_content_select'] == 'wysiwyg' ) {
		// デフォルト値に入力値をマージ
		$value = array_merge( array(
			'lpb_wysiwyg_editor' => ''
		), $value );

		// $value['lpb_wysiwyg_editor'] は何もしない

	}

	return $value;
}

/**
 * クローン用のリッチエディター化処理をしないようにする
 * クローン後のリッチエディター化はjsで行う
 */
function lp_builder_tiny_mce_before_init( $mceInit, $editor_id ) {
	if ( strpos( $editor_id, 'lpb_content_cloneindex' ) !== false ) {
		$mceInit['wp_skip_init'] = true;
	}
	return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'lp_builder_tiny_mce_before_init', 10, 2 );
