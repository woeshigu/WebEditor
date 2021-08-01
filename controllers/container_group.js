jQuery(function($) {
	var category = ' ';
	$(document).on('click', '.container-group', function() {
		$('.container-blocks').css('display', 'block');
		$('.buttons-dnd').css('display', 'block');
		$('.tools-btn').css('display', 'none');
		category = $(this).attr('class').split(' ')[0]
	});
});