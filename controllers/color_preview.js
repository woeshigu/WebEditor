jQuery(function($) {
	$(document).on('change', '.color-picker', function() {
		let alpha = ($('.alpha-input').val() * 2.55).toString(16);
		if (alpha.length % 2) {
			alpha = alpha + '0';
		}
		alpha = alpha.substr(0, 2);
		let color = $(this).val();
		$('.color-preview').css('background-color', color + alpha);
	});
	$(document).on('change', '.alpha-input', function() {
		let alpha = ($('.alpha-input').val() * 2.55).toString(16);
		if (alpha.length % 2) {
			alpha = alpha + '0';
		}
		alpha = alpha.substr(0, 2);
		let color = $('.color-picker').val();
		$('.color-preview').css('background-color', color + alpha);
	});
});