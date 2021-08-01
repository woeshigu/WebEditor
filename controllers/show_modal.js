jQuery(function($) {
	$(document).on('click', '.log-in', function() {
		$('.log-in-window').css({
			display: 'block'
		});
		let start = Date.now();
		let timer = setInterval(function() {
		// сколько времени прошло с начала анимации?
		let timePassed = Date.now() - start;

		if (timePassed >= 200) {
		clearInterval(timer); // закончить анимацию через 0.2 секунды
		return;
		}

		// отрисовать анимацию на момент timePassed, прошедший с начала анимации
		draw(timePassed);

		}, 20);
		function draw(timePassed) {
			$('.log-in-window').css({
				opacity: (timePassed / 200).toString()
			})
		}
	});
	$(document).on('click', '.register', function() {
		$('.register-window').css({
			display: 'block'
		});
		let start = Date.now();
		let timer = setInterval(function() {
		// сколько времени прошло с начала анимации?
		let timePassed = Date.now() - start;

		if (timePassed >= 200) {
		clearInterval(timer); // закончить анимацию через 0.2 секунды
		return;
		}

		// отрисовать анимацию на момент timePassed, прошедший с начала анимации
		draw(timePassed);

		}, 20);
		function draw(timePassed) {
			$('.register-window').css({
				opacity: (timePassed / 200).toString()
			})
		}
	});
});