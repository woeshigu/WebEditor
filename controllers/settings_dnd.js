jQuery(function($) {
	$(document).on('click', '.close-dnd', function() {
		let items = $('.dnd-field').children();
		$('.tools-btn').css('display', 'flex');
		for (let i = 0; i < items.length; i++) {
			$(items[i]).css('display', 'none');
		}
	});
});