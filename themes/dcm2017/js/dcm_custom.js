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

    /*Propose session get heighest session height and apply to all session block*/
    var highest = null;
    var hi = 0;
    $(".view-sessions .owl-item ul li").each(function(){
        var h = $(this).height();
        if(h > hi){
         hi = h;
        }    
    });
    $(".view-sessions .owl-item ul li").height(hi);
    /*End Propose session get heighest session height and apply to all session block*/
});