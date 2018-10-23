jQuery(document).ready(function(){

	SV_COMMON.table_sticky_header();

});

var SV_COMMON = new function(){
	
	const $ = jQuery;
	const header = $('body > header');
	
	this.table_sticky_header = function(){

		var items = $('table.table-sticky-header');
		if(items.length < 1)return false;
		items.each(function(){
			var sticky = $(this);
			var thead = sticky.find('thead');
			$(window).scroll(function(){
				if(thead.length > 0){
					const parent = thead.parent();
					const body_c   = parent.find('tbody > tr > th');
					const thead_c	= thead.find('tr:first-child > th');
					
					body_c.each(function(){
						$(this).css({
							'width':$(this).attr('width'),
							'max-width':$(this).attr('width'),
							'min-width':$(this).attr('width'),
						});
					});
					
					thead_c.each(function(){
						$(this).css({
							'width':$(this).attr('width'),
							'max-width':$(this).attr('width'),
							'min-width':$(this).attr('width'),
						});
					});
					
					thead.css({
						'top':header.outerHeight()+thead.outerHeight()-6+'px',
						'max-width':parent.outerWidth()+'px',
						'min-width':parent.outerWidth()+'px',
						'width':parent.outerWidth()+'px',
					});

				}
				var top		= sticky.offset().top;
				var y		= $(this).scrollTop();
				if (y+header.outerHeight() >= top){
					sticky.addClass('sticky');
				}else{
					sticky.removeClass('sticky');
				}
			});
		});
		
		
		
	};
	
}; // END
/*
 * by dennis heiden
 * co straightvisions.com
 * vs 1.0
 *
 * REVIEW: DO WE NEED THIS? OR SHOULD WE EXPAND THIS AS A MASTER CLASS?
 */
jQuery(function($){
	var SV = new function(){
		var self = this;
		self.log = function(msg,group){
			if(!window.console)return false;
			console.groupCollapsed('SV Scripts');
			if(typeof group !== 'undefined'){
				console.groupCollapsed(group);
				console.log(msg);
				console.groupEnd();
			}else{
				console.log(msg);
			}
			console.groupEnd();
		};

	}; // end SV

});