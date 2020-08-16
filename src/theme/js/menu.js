(function($) {

	'use strict';

	var init = function() {
		toogleNav();
	};

	var toogleNav = function(){

		//Toggle the all nav on mobile
		$('#toggleNav').click(function(){

			$(this).toggleClass('active');
			$('.mainHeader__nav').toggleClass('active');

		});

		//Toggle the sub nav on mobile
		$('.menu-item-has-children > a').click(function(e){

			if($(window).width() < 992){

				e.preventDefault();

				var $menuItem = $(this).parent().find('.sub-menu');

				if($menuItem.hasClass('active')){

					$('.sub-menu').removeClass('active');

				}else{

					$('.sub-menu').removeClass('active');

					$menuItem.addClass('active');

				}
				

			}
			

		});


	};

	$(document).ready(function() {
		init();
	});

})(jQuery);
