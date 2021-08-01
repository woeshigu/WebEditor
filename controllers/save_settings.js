jQuery(function($) {
	$('.save-settings').on('click', function() {
		if (category = 'bg-group') {
			$('body').css('background-color', $('.color-preview').css('background-color'));
		}
	});
});