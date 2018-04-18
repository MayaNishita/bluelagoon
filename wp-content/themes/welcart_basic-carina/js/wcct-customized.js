( function( $ ) {
	
	$(function() {
		var pair = location.search.substring(1).split('&');
		var arg = new Object;
		for( var i = 0; pair[i]; i++ ) {
			var kv = pair[i].split('=');
			arg[kv[0]] = kv[1];
		}
		if( undefined != arg.from_item && undefined != arg.from_sku ) {
			$('.wpcf7-submit').on('click', function() {
				var form = $(this).parents('form');
				form.attr('action', $(this).data('action'));
				$('<input>').attr({
					'type': 'hidden',
					'name': 'from_item',
					'value': arg.from_item
				}).appendTo(form);
				$('<input>').attr({
					'type': 'hidden',
					'name': 'from_sku',
					'value': arg.from_sku
				}).appendTo(form);
			});
		}
	})

} )( jQuery );
