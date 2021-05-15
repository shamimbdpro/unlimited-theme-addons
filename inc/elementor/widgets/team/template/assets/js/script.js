(function($){
	'use script';


	// Scroll Area
	$(document).ready(function(){
	    $('.scroll-area').click(function(){
	      	$('html').animate({
	        	'scrollTop' : 0,
	      	},700);
	      	return false;
	    });
	    $(window).on('scroll',function(){
	      	var a = $(window).scrollTop();
	      	if(a>400){
	            $('.scroll-area').slideDown(300);
	        }else{
	            $('.scroll-area').slideUp(200);
	        }
	    });
	});




}(jQuery));