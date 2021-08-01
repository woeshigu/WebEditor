jQuery(function($) {
	$(document).on('click', '.set-name', function() {
		console.log($('.rename-input').val());
		if ($('.rename-input').val()) {
			$.ajax({
				url: './models/rename.php',
				type: 'POST',
				data: {
					name: $('.rename-input').val(),
					email: $('.cur-email').val()
				},
				success: function(data) {
					if (data) {
						$('.project-name').text($('.rename-input').val())
					} else {
						alert('Invalid name!');
					}
				}
			});
		}
	});
});