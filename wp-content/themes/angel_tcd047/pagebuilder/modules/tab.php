<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-tab',
	'form' => 'form_page_builder_widget_tab',
	'form_rightbar' => 'form_rightbar_page_builder_widget_tab',
	'save' => 'save_page_builder_repeater',
	'display' => 'display_page_builder_widget_tab',
	'title' => __('Tab', 'tcd-w'),
	'description' => __('You can display content using tab.', 'tcd-w'),
	'additional_class' => 'pb-repeater-widget',
	'priority' => 31
));

/**
 * フォーム
 */
function form_page_builder_widget_tab($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_tab_default_values', array(
		'widget_index' => '',
		'repeater' => array()
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// リピーター行の並び
	$repeater_indexes = array();
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行 最大インデックス
	$repeater_index_max = 0;
	if ($repeater_indexes) {
		$repeater_indexes = array_map('intval', $repeater_indexes);
		$repeater_index_max = max($repeater_indexes);
	}

	echo '<div class="pb_repeater_wrap" data-rows="'.$repeater_index_max.'">'."\n";
	echo '	<div class="pb_repeater_sortable">'."\n";

	// リピーター行あり
	if ($repeater_indexes) {
		// リピーター行ループ
		foreach($repeater_indexes as $repeater_index) {
			// リピーター行データあり
			if (!empty($values['repeater'][$repeater_index])) {
				// リピーター行出力
				form_page_builder_widget_tab_repeater_row(
					array(
						'widget_index' => $values['widget_index'],
						'repeater_index' => $repeater_index
					),
					$values['repeater'][$repeater_index]
				);
			}
		}
	}

	echo '	</div>'."\n"; // .pb_repeater_sortable

	// 項目の追加ボタン
	echo '<div class="form-field">';
	echo '<a href="#" class="pb_add_repeater button-primary">'.__('Add item', 'tcd-w').'</a>';
	echo '</div>'."\n";

	// 追加ボタン時に差し込むHTML
	echo '<div class="add_pb_repeater_clone hidden" style="display:none">'."\n";

	// 行出力
	form_page_builder_widget_tab_repeater_row(
		array(
			'widget_index' => $values['widget_index'],
			'repeater_index' => 'pb_repeater_add_index'
		),
		array(
			'repeater_label' => __('New item', 'tcd-w')
		)
	);

	echo '</div>'."\n"; // .add_pb_repeater_clone

	echo '</div>'."\n"; // .pb_repeater_wrap
}

/**
 * リピーター行出力
 */
function form_page_builder_widget_tab_repeater_row($values = array(), $row_values = array()) {
	// デフォルト値に入力値をマージ
	$values = array_merge(
		array(
			'widget_index' => '',
			'repeater_index' => ''
		),
		(array) $values
	);

	// 行デフォルト値
	$default_row_values = apply_filters('page_builder_widget_tab_default_row_values', array(
		'repeater_label' => '',
		'tab_name' => '',
		'headline' => '',
		'content' => ''
	));

	// 行デフォルト値に行の値をマージ
	$row_values = array_merge(
		$default_row_values,
		(array) $row_values
	);

	// リピーター表示名
	if (!$row_values['repeater_label'] && $row_values['tab_name']) {
		$row_values['repeater_label'] = $row_values['tab_name'];
	} elseif (!$row_values['repeater_label']) {
		$row_values['repeater_label'] = __('New item', 'tcd-w');
	}
?>

<div id="pb_tab-<?php echo esc_attr($values['widget_index'].'-'.$values['repeater_index']); ?>" class="pb_repeater pb_repeater-<?php echo esc_attr($values['repeater_index']); ?>">
	<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater_index][]" value="<?php echo esc_attr($values['repeater_index']); ?>" />
	<ul class="pb_repeater_button pb_repeater_cf">
		<li><span class="pb_repeater_move"><?php _e('Move', 'tcd-w'); ?></span></li>
		<li><span class="pb_repeater_delete" data-confirm="<?php _e('Are you sure you want to delete this item?', 'tcd-w'); ?>"><?php _e('Delete', 'tcd-w'); ?></span></li>
	</ul>
	<div class="pb_repeater_content">
		<h3 class="pb_repeater_headline"><span class="index_label"><?php echo esc_attr($row_values['repeater_label']); ?></span><a href="#"><?php _e('Open', 'tcd-w'); ?></a></h3>
		<div class="pb_repeater_field">
			<div class="form-field">
				<h4><?php _e('Name', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][tab_name]" value="<?php echo esc_attr($row_values['tab_name']); ?>" class="index_label" />
			</div>

			<div class="form-field">
				<h4><?php _e('Headline', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][headline]" value="<?php echo esc_attr($row_values['headline']); ?>" />
			</div>

			<div class="form-field form-field-editor">
				<h4><?php _e('Sentence', 'tcd-w'); ?></h4>
				<?php
					wp_editor(
						$row_values['content'],
						str_replace('-', '_', 'pb_tab_'.$values['widget_index'].'_'.$values['repeater_index'].'_content'),
						array(
							'textarea_name' => 'pagebuilder[widget]['.$values['widget_index'].'][repeater]['.$values['repeater_index'].'][content]',
							'textarea_rows' => 10
						)
					);
				?>
			</div>
		</div>
	</div>
</div>

<?php
}

/**
 * クローン用のリッチエディター化処理をしないようにする
 * クローン後のリッチエディター化はjsで行う
 */
function page_builder_widget_tab_tiny_mce_before_init($mceInit, $editor_id) {
	if (strpos($editor_id, 'pb_tab_') == 0 && strpos($editor_id, '_pb_repeater_add_index_content') !== false) {
		$mceInit['wp_skip_init'] = true;
	}
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'page_builder_widget_tab_tiny_mce_before_init', 10, 2);

/**
 * フォーム 右サイドバー
 */
function form_rightbar_page_builder_widget_tab($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_tab_default_values', array(
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
function display_page_builder_widget_tab($values = array(), $widget_index = null) {
	// リピーター行の並び
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行ループし、行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行がなければ終了
	if (empty($repeater_indexes)) return;

	// ths_contentフィルター
	remove_filter('the_content', 'page_builder_filter_the_content', 8);
?>
<div class="pb_tab">
  <ul class="resp-tabs-list">
<?php
	foreach($repeater_indexes as $repeater_index) {
		$repeater_values = $values['repeater'][$repeater_index];

		echo '<li>'.esc_html($repeater_values['tab_name']).'</li>';
	}
?>
  </ul>
  <div class="resp-tabs-container">
<?php
	foreach($repeater_indexes as $repeater_index) {
		$repeater_values = $values['repeater'][$repeater_index];
?>
    <div class="pb_tab_content">
<?php	if (!empty($repeater_values['headline'])) {  ?>
      <h3 class="pb_headline"><?php echo esc_html($repeater_values['headline']); ?></h3>
<?php	} ?>
<?php	if (!empty($repeater_values['content'])) {  ?>
      <?php echo apply_filters('the_content', $repeater_values['content']); ?>
<?php	} ?>
    </div>
<?php
	}
?>

  </div>
</div>
<?php

	// ths_contentフィルターを戻す
	add_filter('the_content', 'page_builder_filter_the_content', 8);
}

/**
 * フロント用js・css
 */
function page_builder_widget_tab_sctipts() {
	wp_enqueue_script('page_builder-tab', get_template_directory_uri().'/pagebuilder/assets/js/tab.js', array('jquery'), PAGE_BUILDER_VERSION, true);
}

function page_builder_widget_tab_styles() {
	wp_enqueue_style('page_builder-tab', get_template_directory_uri().'/pagebuilder/assets/css/tab.css', false, PAGE_BUILDER_VERSION);
}

function page_builder_widget_tab_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-tab')) {
		add_action('wp_enqueue_scripts', 'page_builder_widget_tab_sctipts', 11);
		add_action('wp_enqueue_scripts', 'page_builder_widget_tab_styles', 11);
		add_action('wp_head', 'pb_tab_script_header');
	}
}
add_action('wp', 'page_builder_widget_tab_sctipts_styles');

function pb_tab_script_header() {
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  $('.pb_tab').easyResponsiveTabs();
});
</script>
<?php
}

