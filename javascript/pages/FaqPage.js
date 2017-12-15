(function($){
	"use strict";
	function faqClickHander(){
		var tag = $(this).parent().children('.faq-expand');
		var answer_mask = $(this).parent().children('.faq-answer-mask');
		var height_needed = $(this).parent().find('.faq-answer').css('height');
		var is_closed = answer_mask.css('height') === '0px';
		if(is_closed){
			answer_mask.animate({
				height: height_needed,
			}, {	
				duration:500,
				complete: function() {
					// Animation complete.
					tag.css('background-position','center -11px');
				},
				progress: function(){ 
					fixAllHeights(); 
					if(typeof FaqOnExpand === "function"){
						FaqOnExpand();
					}
				}				
			});
		} else {
			answer_mask.animate({
				height: '0px'
			}, {	
				duration:500,
				complete: function() {
					// Animation complete.
					tag.css('background-position','center top');
				},
				progress: function(){ 
					fixAllHeights(); 
					if(typeof FaqOnCollapse === "function"){
						FaqOnCollapse();
					}
				}	
			});
		}
	}
	$(window).load(function(){
		$('.faq-question').click(faqClickHander);
		$('.faq-icon').click(faqClickHander);
		
		$('.faq-question').hover(
			function(){
				var tag = $(this).parent().children('.faq-expand');
				tag.show();
			},
			function(){
				var tag = $(this).parent().children('.faq-expand');
				tag.hide();
			}
		);
		
		$('.faq-icon').hover(
			function(){
				var tag = $(this).parent().children('.faq-expand');
				tag.show();
			},
			function(){
				var tag = $(this).parent().children('.faq-expand');
				tag.hide();
			}
		);
	});
}(jQuery));