jQuery(document).ready(function($){

  // ロゴに画像を使うかテキストを使うか選択
  $("#logo_type_select #use_logo_image_no").click(function () {
    $(".logo_text_area").show();
    $(".logo_image_area").hide();
  });
  $("#logo_type_select #use_logo_image_yes").click(function () {
    $(".logo_text_area").hide();
    $(".logo_image_area").show();
  });


  // トップページのヘッダースライダー　タイプの選択
  $("#index_slider_type_button1").click(function () {
    $(".index_slider_type1_area").show();
    $(".index_slider_type2_area").hide();
  });
  $("#index_slider_type_button2").click(function () {
    $(".index_slider_type1_area").hide();
    $(".index_slider_type2_area").show();
  });


  // トップページのヘッダースライダー　レティナディスプレイの選択
  $(".index_slider_use_retina_checkbox input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('.index_slider_retina_image').show();
    $('.index_slider_normal_image').hide();
   } else {
    $('.index_slider_retina_image').hide();
    $('.index_slider_normal_image').show();
   }
  });

  // トップページのバナー　タイプの選択
  $("#index_banner_content_type_button1").click(function () {
    $(".index_banner_content_type1_area").show();
    $(".index_banner_content_type2_area").hide();
  });
  $("#index_banner_content_type_button2").click(function () {
    $(".index_banner_content_type1_area").hide();
    $(".index_banner_content_type2_area").show();
  });


  // トップページのバナー　レティナディスプレイの選択
  $(".index_banner_content_use_retina_checkbox input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('.index_banner_content_retina_image').show();
    $('.index_banner_content_normal_image').hide();
   } else {
    $('.index_banner_content_retina_image').hide();
    $('.index_banner_content_normal_image').show();
   }
  });

  // アーカイブページのレティナディスプレイの選択
  $(".archive_blog_use_retina_checkbox:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('.archive_blog_retina_image').show();
    $('.archive_blog_normal_image').hide();
   } else {
    $('.archive_blog_retina_image').hide();
    $('.archive_blog_normal_image').show();
   }
  });

  // アコーディオンの開閉
  $('.sub_box').on('click', '.theme_option_subbox_headline', function(){
   $(this).parents('.sub_box').toggleClass('active');
   return false;
  });


  // theme option tab
  $('#my_theme_option').cookieTab({
   tabMenuElm: '#theme_tab',
   tabPanelElm: '#tab-panel'
  });


  // rebox
  $("#ml_custom_fields_box1").rebox({
   selector:'a',
   zIndex: 99999,
   loading: '&loz;'
  });


	// radio button for page custom fields
   $("#map_type_type2").click(function () {
    $(".google_map_code_area").hide();
    $(".google_map_code_area2").show();
   });

   $("#map_type_type1").click(function () {
    $(".google_map_code_area").show();
    $(".google_map_code_area2").hide();
   });

   $(".ml_custom_fields_select .template li label").click(function () {
     $(".ml_custom_fields_select .template li label").removeClass('active');
     $(this).addClass('active');
   });

   $(".ml_custom_fields_select .side_content li label").click(function () {
     $(".ml_custom_fields_select .side_content li label").removeClass('active');
     $(this).addClass('active');
   });


  // フッターの固定メニュー --------------------------------------------------------------
  // アコーディオンの開閉
  $(".repeater").on("click", ".theme_option_subbox_headline", function() {
    $(this).parents(".sub_box").toggleClass("active");
    return false;
  });

  // ボタンの並び替え
  $(".sortable").sortable({
    placeholder: "sortable-placeholder",
    helper: "clone",
    forceHelperSize: true,
    forcePlaceholderSize: true
  });

  // 新しいアイテムを追加する
  $(".repeater-wrapper").each(function() {
    var next_index = $(this).find(".repeater-item").last().index();
    $(this).find(".button-add-row").click(function() {
      var clone = $(this).attr("data-clone");
      var $parent = $(this).closest(".repeater-wrapper");
      if (clone && $parent.size()) { 
        next_index++;
        clone = clone.replace(/addindex/g, next_index);
        $parent.find(".repeater").append(clone.replace(/addindex/g, next_index));
      }
      return false;
    });
  });

  // アイテムを削除する
  $(".repeater").on("click", ".button-delete-row", function() {
    var del = true;
    var confirm_message = $(this).closest(".repeater").attr("data-delete-confirm");
    if (confirm_message) {
      del = confirm(confirm_message);
    }
    if (del) {
      $(this).closest(".repeater-item").remove();
    }
    return false;
  });

  // ボタンのタイプによって、表示フィールドを切り替える
  $(".repeater").each(function() {
    $(this).on("change", ".footer-bar-type select", function() {
      var sub_box = $(this).parents(".sub_box");
      var target = sub_box.find(".footer-bar-target");
      var url = sub_box.find(".footer-bar-url");
      var number = sub_box.find(".footer-bar-number");
      switch ($(this).val()) {
        case "type1" :
          target.show();
          url.show();
          number.hide();
          break;
        case "type2" :
          target.hide();
          url.hide();
          number.hide();
          break;
        case "type3" :
          target.hide();
          url.hide();
          number.show();
        break;
      }
    });
  });

  // リピーター ボタン名
  $(document).on('change keyup', '.repeater .repeater-label', function(){
    $(this).closest('.repeater-item').find('.theme_option_subbox_headline').text($(this).val());
  });
  // フッターの固定メニューここまで --------------------------------------------------------------

	// 保護ページのラベルを見出し（.theme_option_subbox_headline）に反映する
  $(document).on('change keyup', '.theme_option_subbox_headline_label', function(){
		$(this).closest('.sub_box_content').prev().find('span').text(' : ' + $(this).val());
  });

});
