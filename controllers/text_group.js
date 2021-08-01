jQuery(function($) {
	$(document).on('click', '.txt-group', function() {
		$('.text').css('display', 'flex');
		$('.buttons-settings').css('display', 'block');
		$('.save-settings').css('opacity', '0');
		$('.tools-btn').css('display', 'none');
		$('.text-blocks').css('display', 'flex');
		$('#font-size').val(parseInt($($('.text-block').children()[0]).css('font-size')));
		category = $(this).attr('class').split(' ')[0]
	});
	var text = 'Text';
	$(document).on('change', '#text-area', function() {
		text = $(this).val();
		$($('.text-block.dnd-item').children()[0]).text(text);
	});
	$(document).on('change', '#fsize-box', function() {
		if ($('#fsize-box').is(':checked')) {
			$('#font-size').removeAttr('disabled');
		} else {
			$('#font-size').attr('disabled', 'disabled');
			$('#font-size').val(parseInt($($('.text-block').children()[0]).css('font-size')));
		}
	});
	$(document).on('change', '#font-size', function() {
		$($('.text-block').children()[0]).css('font-size', $(this).val() + 'px');
	});
	$(document).on('change', '.text-type', function() {
		if ($(this).val() == 'header') {
			$('.header-lvl').css('display', 'block');
			$('.text-block.dnd-item').empty();
			$('.text-block.dnd-item').append('<' + $('.header-lvl').val() + ' class="text-sample">');
			$($('.text-block.dnd-item').children()[0]).text(text);
		} else {
			$('.header-lvl').css('display', 'none');
			$('.text-block.dnd-item').empty();
			$('.text-block.dnd-item').append('<p class="text-sample">');
			$($('.text-block.dnd-item').children()[0]).text(text);
		}
	});
	$(document).on('change', '.header-lvl', function() {
		$('.text-block.dnd-item').empty();
		$('.text-block.dnd-item').append('<' + $('.header-lvl').val() + ' class="text-sample">');
		$($('.text-block.dnd-item').children()[0]).text(text);
	});
});