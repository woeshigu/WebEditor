jQuery(function($) {
	$(document).on('click', '.buttons>.close', function() {
		let modal = $(this).parents()[2]
		let start = Date.now();
		let timer = setInterval(function() {
		// сколько времени прошло с начала анимации?
		let timePassed = Date.now() - start;

		if (timePassed >= 200) {
		clearInterval(timer); // закончить анимацию через 0.2 секунды
		$(modal).css({
			display: 'none'
		});
		return;
		}

		// отрисовать анимацию на момент timePassed, прошедший с начала анимации
		draw(timePassed);

		}, 20);
		function draw(timePassed) {
			$(modal).css({
				opacity: (1 - timePassed / 200).toString()
			})
		}
	});
});