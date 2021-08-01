jQuery(function($) {
	$('.project-name').on('click', function() {
		if ($('.project-props').css('display') != 'none') {
			$('.project-props').css('display', 'none');
		} else {
			$('.project-props').css('display', 'block');
		}
	});
});