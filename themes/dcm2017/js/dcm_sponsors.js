jQuery(document).ready(function($){
	/*Sticky menu*/
	/* function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var footer_top = $(".footer").offset().top;
		var div_top = $('#dcm-sticky-menu').offset().top;
		var div_height = $("#dcm-sticky-menu nav .menu").height();
		
		var padding = 20;  // tweak here or get from margins etc
		
		if (window_top + div_height > footer_top - padding)
			$('#dcm-sticky-menu nav .menu').css({top: (window_top + div_height - footer_top + padding) * -1})
		else if (window_top > div_top) {
			$('#dcm-sticky-menu nav .menu').addClass('stick');
			$('#dcm-sticky-menu nav .menu').css({top: 0})
		} else {
			$('#dcm-sticky-menu nav .menu').removeClass('stick');
		}
	}
	$(function () {
		$(window).scroll(sticky_relocate);
		sticky_relocate();
	}); */
	/*End Sticky menu*/
});