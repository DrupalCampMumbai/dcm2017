jQuery(document).ready(function($){
	/*Navigation menu on hover*/
    $(".dropdown").hover(            
    function() {
        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
        $(this).toggleClass('open');
        $('span', this).toggleClass("caret caret-up");                
    },
    function() {
        $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
        $(this).toggleClass('open');
        $('span', this).toggleClass("caret caret-up");                
    });
    /*End Navigation menu on hover*/
});