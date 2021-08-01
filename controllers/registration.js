jQuery(function($) {
	$(document).on('click', '.register-window .send-data', function() {
		if ($('.reg-password').val() == '' || $('.reg-repeat-password').val() == '') {
			$('.register-window .inputs').addClass('emptypas');
			$('.reg-password').css('border-color', 'red');
			$('.reg-repeat-password').css('border-color', 'red');
		} else {
			if ($('.reg-password').val() != $('.reg-repeat-password').val()) {
				$('.register-window .inputs').attr('class', 'inputs');
				$('.register-window .inputs').addClass('mismatch');
			} else {
				$.ajax({
					url: './models/registration.php',
					type: 'POST',
					data: {
						username: $('.reg-username').val(),
						email: $('.reg-email').val(),
						password: $('.reg-password').val()
					},
					success: function(data) {
						if (data != '') {
							$('.log-in').css('display', 'none');
							$('.register').css('display', 'none');
							$('.log-out').css('display', 'block');
							$('.modal-window').css('display', 'none');
							$('.prof-name').text(data);
						} else {
							alert('Account with this e-mail already created!');
						}
					}
				});
			}
		}
	});
});
