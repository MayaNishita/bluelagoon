jQuery(document).ready(function($) {

	// ウィジェット追加モーダルのエディターウィジェットクリック
	$('#pb-add-widget-modal .pb-select-widget a.pb-widget-editor').on('click', function(e){
		var $meta_wrap = $(this).closest('.postbox');
		var widget_index = $meta_wrap.find('.pb-rows-container').attr('data-widgets');
		var $widget = $meta_wrap.find('#widget-'+widget_index);
		var widget_id = $widget.attr('data-widget-id');

		// クローン元のリッチエディターをループ（リピーターではなくページビルダーのクローン元）
		$meta_wrap.find('.pb-clone .'+widget_id+' .wp-editor-area').each(function(){
			var regexp = new RegExp('widgetindex_'+widget_id.replace(/-/g, '_'), 'g');

			// id
			var id_clone = $(this).attr('id');
			var id_new = id_clone.replace(regexp, widget_index);

			// クローン元のmceInitをコピー置換
			if (typeof tinyMCEPreInit.mceInit[id_clone] != 'undefined') {
				// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
				var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_clone]);
				mce_init_new.body_class = mce_init_new.body_class.replace(regexp, widget_index);
				mce_init_new.selector = mce_init_new.selector.replace(regexp, widget_index);
				tinyMCEPreInit.mceInit[id_new] = mce_init_new;

				// リッチエディター化
				tinymce.init(mce_init_new);
			}

			// クローン元のqtInitをコピー置換
			if (typeof tinyMCEPreInit.qtInit[id_clone] != 'undefined') {
				// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
				var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_clone]);
				qt_init_new.id = qt_init_new.id.replace(regexp, widget_index);
				tinyMCEPreInit.qtInit[id_new] = qt_init_new;

				// テキスト入力のタグボタン有効化
				quicktags(tinyMCEPreInit.qtInit[id_new]);
				try {
					if (QTags.instances['0'].theButtons) {
						QTags.instances[id_new].theButtons = QTags.instances['0'].theButtons;
					}
				} catch(err) {
				}
			}

			// ビジュアルボタンがあればビジュアル状態に
			if ($widget.find('.wp-editor-tabs .switch-tmce').length) {
				$widget.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
			}
		});
	});

});
