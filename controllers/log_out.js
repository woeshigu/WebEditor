jQuery(function($) {
	$(document).on('click', '.log-out', function() {
		$('.cur-email').val('');
		$('.log-out').css('display', 'none');
		$('.log-in').css('display', 'block');
		$('.register').css('display', 'block');
		$('.prof-name').text('');
	});
});