jQuery(function($) {
	$('.show-form').on('click', function() {
		if ($('.form-aut').css('display') == 'block') {
			$('.form-aut').css('display', 'none');
			$(this).text('Show form');
		} else {
			$('.form-aut').css('display', 'block');
			$(this).text('Hide form');

		}
	});
});