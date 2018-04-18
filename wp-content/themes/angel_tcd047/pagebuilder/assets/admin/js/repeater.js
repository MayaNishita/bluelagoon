jQuery(document).ready(function($){

	if ($('.pb_repeater_sortable').size() == 0) return;

	// リピーター ソータブル
	var repeater_sortable = function(){
		$('.pb-rows-container .pb_repeater_wrap .pb_repeater_sortable:not(.ui-sortable)').sortable({
			handle: '.pb_repeater_move',
			tolerance: 'pointer'
		});
	};
	repeater_sortable();

	// リピーター アコーディオンの開閉
	$(document).on('click', '.pb_repeater .pb_repeater_headline', function(){
		$(this).parents('.pb_repeater').toggleClass('open');
		return false;
	});
	$(document).on('click', '.pb_repeater .pb_repeater_headline a', function(){
		$(this).parents('.pb_repeater').toggleClass('open');
		return false;
	});

	// リピーター タブ名
	$(document).on('change keyup', '.pb_repeater .index_label:input', function(){
		$(this).closest('.pb_repeater').find('span.index_label').text($(this).val());
	});

	// リピーター 追加ボタン
	$(document).on('click', '.pb_repeater_wrap .pb_add_repeater', function(){
		var $wrap = $(this).closest('.pb_repeater_wrap');
		var html = $wrap.find('.add_pb_repeater_clone').html();
		var next_index = parseInt($wrap.attr('data-rows')) || 0;

		next_index++;
		$wrap.find('.pb_repeater_sortable').append(html.replace(/pb_repeater_add_index/g, next_index));
		$wrap.attr('data-rows', next_index);

		// リッチエディターがある場合
		if (html.indexOf('wp-editor-area') > -1) {
			var $meta_wrap = $(this).closest('.postbox');
			var $row = $wrap.find('.pb_repeater-'+next_index);
			var widget_id = $(this).closest('.pb-widget').attr('data-widget-id');
			var widget_index = $(this).closest('.pb-widget').attr('data-widget-index');

			// クローン元のリッチエディターをループ（リピーターではなくページビルダーのクローン元）
			$meta_wrap.find('.pb-clone .'+widget_id+' .add_pb_repeater_clone .wp-editor-area').each(function(){
				var replace_widget_index = $(this).closest('.pb-widget').attr('data-widget-index');
				var regexp = new RegExp(replace_widget_index, 'g');

				// id
				var id_clone = $(this).attr('id');
				var id_new = id_clone.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);

				// クローン元のmceInitをコピー置換
				if (typeof tinyMCEPreInit.mceInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_clone]);
					mce_init_new.body_class = mce_init_new.body_class.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
					mce_init_new.selector = mce_init_new.selector.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
					tinyMCEPreInit.mceInit[id_new] = mce_init_new;

					// リッチエディター化
					tinymce.init(mce_init_new);
				}

				// クローン元のqtInitをコピー置換
				if (typeof tinyMCEPreInit.qtInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_clone]);
					qt_init_new.id = qt_init_new.id.replace(regexp, widget_index).replace(/pb_repeater_add_index/g, next_index);
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
				if ($row.find('.wp-editor-tabs .switch-tmce').length) {
					$row.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
				}
			});
		}

		$(this).blur();
		return false;
	});

	// リピーター 削除ボタン
	$(document).on('click', '.pb_repeater .pb_repeater_delete', function(){
		var del = true;
		if ($(this).attr('data-confirm')) {
			del = confirm($(this).attr('data-confirm'));
		}
		if (del) {
			$(this).closest('.pb_repeater').fadeOut('fast', function(){
				$(this).remove();
			});
		}
		return false;
	});

	// ウィジェット追加モーダルのリピーターウィジェットクリック
	$('#pb-add-widget-modal .pb-select-widget a.pb-repeater-widget').on('click', function(e){
		repeater_sortable();
	});

	// ウィジェット編集モーダル表示
	$(document).on('click', '.pb-widget.pb-repeater-widget .widget-edit', function(e){
		// リピーター アコーディオンを閉じる
		$(this).closest('.pb-repeater-widget').find('.pb-modal .pb_repeater.open').removeClass('open');
	});

});