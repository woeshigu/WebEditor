jQuery(function($) {
	$(document).on('click', '.close-settings', function() {
		let settingsItems = $('.settings-field').children();
		let dndItems = $('.dnd-field').children();
		$('.tools-btn').css('display', 'flex');
		$('.btn-tools').css('opacity', '1');
		for (let i = 0; i < settingsItems.length; i++) {
			$(settingsItems[i]).css('display', 'none');
		}
		for (let i = 0; i < dndItems.length; i++) {
			$(dndItems[i]).css('display', 'none');
		}
	});
});