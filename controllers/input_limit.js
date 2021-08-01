jQuery(function($) {
	$(document).on('change', 'input', function() {
		if ($(this).attr('type') == 'number') {
			let max = parseInt($(this).attr('max'));
			let min = parseInt($(this).attr('min'));
			if (parseInt($(this).val()) > max) {
				$(this).val(max);
			} else if (parseInt($(this).val()) < min) {
				$(this).val(min);
			}
		}
	});
});