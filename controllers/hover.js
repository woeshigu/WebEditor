jQuery(function($) {
	document.querySelector('.container').onmouseover = function(e) {
		let childs = $(e.target).find('div').toArray();
		let parents = $(e.target).parents().toArray();
		let sisters = $(e.target).siblings().toArray();
		$(e.target).css({
			border: '1px dotted black'
		});
		childs.forEach(function(item) {
			$(item).css({
				border: 'none'
			});
		});
		parents.forEach(function(item) {
			$(item).css({
				border: 'none'
			});
		});
		sisters.forEach(function(item) {
			$(item).css({
				border: 'none'
			});
		});
	}
	document.querySelector('.working-area').onmouseout = function(e) {
		$(e.target).css({
			border: 'none'
		});
	}
});