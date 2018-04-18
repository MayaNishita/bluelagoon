jQuery(document).ready(function($) {

	var media_frame;
	var pbmf_current;
	var pbmf_text_title = 'Select an Image';
	var pbmf_text_select = 'Use Image';

	if (typeof pbmf_text == 'object') {
		if (typeof pbmf_text.title == 'string') {
			pbmf_text_title = pbmf_text.title;
		}
		if (typeof pbmf_text.button == 'string') {
			pbmf_text_select = pbmf_text.button;
		}
	}

	// click event
	$(document).on('click', '.pb_media_field .pbmf-select-img', function(e){
		e.preventDefault();
		if (typeof media_frame != 'undefined') {
			media_frame.close();
		}

		// create and open new file frame
		media_frame = wp.media({
			title: pbmf_text_title,
			library: {
				type: 'image'
			},
			button: {
				text: pbmf_text_select
			},
			multiple: false,
		});

		media_frame.on('open',function(){
			var selection = media_frame.state().get('selection');
			var selected_media_id = pbmf_current.find('.pb_media_id').val();
			if (selected_media_id) {
				selection.add(wp.media.attachment(selected_media_id));
			}
		});

		// callback for selected image
		media_frame.on('select', function(){
			var selection = media_frame.state().get('selection').first();
			pbmf_current.find('.pb_media_id').val(selection.attributes.id);
			pbmf_current.find('.preview_field').html('<img src="'+selection.attributes.url+'" />');
			pbmf_current.find('.pbmf-delete-img').show();
			pbmf_current = null;
		});

		// form element
		pbmf_current = $(this).closest('.pb_media_field');

		// open
		media_frame.open();
	});

	// delete image
	$(document).on('click', '.pb_media_field .pbmf-delete-img', function(e) {
		var c = $(this).closest('.pb_media_field');
		c.find('.pb_media_id').val('');
		c.find('.preview_field').html('');
		$(this).hide();
	});

});
