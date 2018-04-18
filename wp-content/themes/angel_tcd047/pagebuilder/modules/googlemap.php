<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-googlemap',
	'form' => 'form_page_builder_widget_googlemap',
	'form_rightbar' => 'form_rightbar_page_builder_widget_googlemap',
	'display' => 'display_page_builder_widget_googlemap',
	'title' => __('Google Map', 'tcd-w'),
	'priority' => 21
));

/**
 * 管理画面用js
 */
function page_builder_widget_googlemap_admin_scripts() {
	wp_enqueue_script('page_builder-googlemap-admin', get_template_directory_uri().'/pagebuilder/assets/admin/js/googlemap.js', array('jquery'), PAGE_BUILDER_VERSION, true);
}
add_action('page_builder_admin_scripts', 'page_builder_widget_googlemap_admin_scripts', 12);

/**
 * フォーム
 */
function form_page_builder_widget_googlemap($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_googlemap_default_values', array(
		'widget_index' => '',
		'map_type' => 'type1',
		'map_code1' => '',
		'map_code2' => ''
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);
?>

<div class="form-field form-field-radio">
    <h4><?php _e('Google maps type', 'tcd-w'); ?></h4>
	<?php
		$radio_options = array(
			'type1' => __('Use Google map iframe code', 'tcd-w'),
			'type2' => __('Use TCD Google Maps plugin', 'tcd-w')
		);
		$radio_html = array();
		foreach($radio_options as $key => $value) {
			$attr = '';
			if ($values['map_type'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][map_type]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<div class="form-field form-field-map_code1">
	<h4><?php _e('Google map iframe code', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][map_code1]" rows="4"><?php echo esc_textarea($values['map_code1']); ?></textarea>
</div>

<div class="form-field form-field-map_code2">
	<h4><?php _e('Use TCD Google Maps plugin', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][map_code2]" rows="4"><?php echo esc_textarea($values['map_code2']); ?></textarea>
</div>

<?php
}

/**
 * フォーム 右サイドバー
 */
function form_rightbar_page_builder_widget_googlemap($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_googlemap_default_values', array(
		'widget_index' => '',
		'margin_bottom' => 30,
		'margin_bottom_mobile' => 30
	), 'form_rightbar');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);
?>

<h3><?php _e('Margin setting', 'tcd-w'); ?></h3>
<div class="form-field">
	<label><?php _e('Margin bottom', 'tcd-w'); ?></label>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][margin_bottom]" value="<?php echo esc_attr($values['margin_bottom']); ?>" class="pb-input-narrow hankaku" /> px
	<p class="pb-description"><?php _e('Space below the content.<br />Default is 30px.', 'tcd-w'); ?></p>
</div>
<div class="form-field">
	<label><?php _e('Margin bottom for mobile', 'tcd-w'); ?></label>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][margin_bottom_mobile]" value="<?php echo esc_attr($values['margin_bottom_mobile']); ?>" class="pb-input-narrow hankaku" /> px
	<p class="pb-description"><?php _e('Space below the content.<br />Default is 30px.', 'tcd-w'); ?></p>
</div>

<?php
}

/**
 * フロント出力
 */
function display_page_builder_widget_googlemap($values = array()) {
	if (empty($values['map_type'])) {
	} elseif ($values['map_type'] == 'type1' && isset($values['map_code1'])) {
		echo $values['map_code1'];
	} elseif ($values['map_type'] == 'type2' && isset($values['map_code2'])) {
		echo do_shortcode($values['map_code2']);
	}
}
