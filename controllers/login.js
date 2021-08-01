jQuery(function($) {
	$(document).on('click', '.log-in-window .send-data', function() {
		if ($('.log-password').val() == '' || $('.log-email').val() == '') {
			$('.log-in-window .inputs').addClass('empty');
			$('.log-password').css('border-color', 'red');
			$('.log-email-').css('border-color', 'red');
		} else {
			$.ajax({
				url: './models/login.php',
				type: 'POST',
				data: {
					email: $('.log-email').val(),
					password: $('.log-password').val(),
					content: $('.working-area').html().toString()
				},
				success: function(data) {
					if (data != '') {
						let response = JSON.parse(data);
						$('.cur-email').val($('.log-email').val());
						$('.log-in').css('display', 'none');
						$('.register').css('display', 'none');
						$('.log-out').css('display', 'block');
						$('.modal-window').css('display', 'none');
						$('.prof-name').text(response.username);
						$('.project-name').text(response.last_project);
					} else {
						alert('Email or password are incorrect!');
					}
				}
			});
		}
	});
});