jQuery(function($) {
	$(document).on('click', '.hide-tools', function() {
		if ($('.tools').css('display') != 'none') {
			$(this).text("Show tools");
			$('.tools').css('display', 'none');
			$('.working-area').css('width', '100%');
		} else {
			$(this).text("Hide tools");
			$('.tools').css('display', 'block');
			$('.working-area').css('width', '80%');
		}
	});
});