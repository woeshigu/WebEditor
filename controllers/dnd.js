jQuery(function($) {
	function allowDrop(event) {
		event.preventDefault()
	}
	function drag(event) {
		jQuery.event.addProp('dataTransfer');
		event.dataTransfer.setData('class', event.target.className.split(' ').splice(0, event.target.className.split(' ').length - 1).join(' '));
		event.dataTransfer.setData('html', $('.' + event.target.className.split(' ')[0]).html());
	}
	function dragstop(event) {
	}
	function drop(event) {
		let itemClass = event.dataTransfer.getData('class');
		let itemHTML = event.dataTransfer.getData('html');
		let regexp = /[^\n\t\r]/g;
		let res = '';
		if (itemHTML) {
			res = itemHTML.match(regexp).join('')
		}
		$(event.target).append('<div class="' + itemClass + '">' + res + '</div>');
		$(event.target).css({
			height: 'auto'
		});
		if ($('.cur-email').val() != '') {
			$.ajax({
				url: './models/save.php',
				type: 'POST',
				data: {
					project_name: $('.project-name').text(),
					username: $('.prof-name').text(),
					content: $('.working-area').html(),
					email: $('.cur-email').val()
				},
				success: function(data) {
					console.log(data);
				}
			});
		}
	}
	const dndTools = $('.dnd-group').toArray();
	const waItems = $('.wa-element').toArray();
	const dndItems = $('.dnd-item').toArray();
	dndItems.forEach(function(item) {
		$('.' + item.className.split(' ')[0]).on('dragstart', drag);
		$('.' + item.className.split(' ')[0]).on('dragend', dragstop);
	});
	waItems.forEach(function(item) {
		$('.' + item.className.split(' ')[0]).on('drop', drop);
		$('.' + item.className.split(' ')[0]).on('dragover', allowDrop);
	});
});
