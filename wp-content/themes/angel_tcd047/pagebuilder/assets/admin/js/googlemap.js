jQuery(document).ready(function($){

	// Google Mapの選択
	$(document).on('change', '.pb-widget-googlemap .form-field-radio :radio', function(){
		if (this.checked) {
			var $cl = $(this).closest('.pb-content');
			if (this.value == 'type2') {
				$cl.find('.form-field-map_code1').hide();
				$cl.find('.form-field-map_code2').show();
			} else {
				$cl.find('.form-field-map_code2').hide();
				$cl.find('.form-field-map_code1').show();
			}
		}
	});
	$('.pb-widget-googlemap .form-field-radio :radio:checked').each(function(){
		$(this).trigger('change');
	});

});
