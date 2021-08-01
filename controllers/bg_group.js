jQuery(function($) {
	$(document).on('click', '.bg-group', function() {
		$('.color-preview').css({
			backgroundColor: $('body').css('background-color')
		});
		$('.bg-color').css('display', 'flex');
		$('.buttons-settings').css('display', 'block');
		$('.tools-btn').css('display', 'none');
		category = $(this).attr('class').split(' ')[0]
	});
});