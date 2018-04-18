<?php

/**
 * 管理画面用js・css
 */
function page_builder_media_field_admin_scripts() {
	wp_enqueue_script('page_builder-media-field', get_template_directory_uri().'/pagebuilder/assets/admin/js/media-field.js', array('jquery'), PAGE_BUILDER_VERSION, true);
	wp_localize_script('page_builder-media-field', 'pbmf_text', array(
		'title' => __('Select an Image', 'tcd-w'),
		'button' => __('Use Image', 'tcd-w'),
	));
}
add_action('page_builder_admin_scripts', 'page_builder_media_field_admin_scripts', 11);

function page_builder_media_field_admin_styles() {
	wp_enqueue_style('page_builder-media-field', get_template_directory_uri().'/pagebuilder/assets/admin/css/media-field.css', false, PAGE_BUILDER_VERSION);
}
add_action('page_builder_admin_styles', 'page_builder_media_field_admin_styles', 11);


/**
 * フォーム用 画像フィールド出力
 */
function pb_media_form($input_name, $media_id) {
	if (empty($input_name)) return false;
?>
	<div class="pb_media_field hide-if-no-js">
		<input type="hidden" class="pb_media_id" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($media_id); ?>" />
		<div class="preview_field"><?php if ($media_id) echo wp_get_attachment_image($media_id, 'medium'); ?></div>
		<div class="buttton_area">
			<input type="button" class="pbmf-select-img button" value="<?php esc_attr_e('Select Image', 'tcd-w'); ?>" />
			<input type="button" class="pbmf-delete-img button <?php if (!$media_id) echo 'hidden'; ?>" value="<?php esc_attr_e('Remove Image', 'tcd-w'); ?>" />
		</div>
	</div>
<?php
}
