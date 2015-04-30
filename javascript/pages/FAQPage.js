$(window).load(function(){
	$('.FAQQuestion').click(clickHander);
	$('.FAQIcon').click(clickHander);
	
	function clickHander(event){
		var tag = $(this).parent().children('.FAQExpand');
		var answer_mask = $(this).parent().children('.FAQAnswerMask');
		var height_needed = $(this).parent().children('.FAQAnswerMask').children('.FAQAnswer').css('height');
		var is_closed = answer_mask.css('height') == '0px';
		if(is_closed){
			answer_mask.animate({
				height: height_needed
			}, 500, function() {
				// Animation complete.
				tag.css('background-position','center -11px');
			});
		} else {
			answer_mask.animate({
				height: '0px'
			}, 500, function() {
				// Animation complete.
				tag.css('background-position','center top');
			});
		}
	}
	
	$('.FAQQuestion').hover(
		function(){
			var tag = $(this).parent().children('.FAQExpand');
			tag.show();
		},
		function(){
			var tag = $(this).parent().children('.FAQExpand');
			tag.hide();
		}
	);
	
	$('.FAQIcon').hover(
		function(){
			var tag = $(this).parent().children('.FAQExpand');
			tag.show();
		},
		function(){
			var tag = $(this).parent().children('.FAQExpand');
			tag.hide();
		}
	);
});