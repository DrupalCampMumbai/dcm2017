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

    /*Propose session get heighest session height and apply to all session block*/
    var highest1 = null;
    var hi1 = 0;
    $(".view-sponsors .views-field-body").each(function(){
        var h1 = $(this).outerHeight(true);
        if(h1 > hi1){
         hi1 = h1;
        }    
    });
    $(".view-sponsors .views-field-field-sponsor-logo").height(hi1);
    /*End Propose session get heighest session height and apply to all session block*/

    /*For screen size*/
    if ($(window).width() < 768) {
        /*Responsive menu*/
        $(window).load(function () {
            //var userNametxt = $('.login-user h1').text();
            $('header#navbar #dcm-sticky-menu .menu.nav').prepend('<h2 class="welcomeUserMenu"><span>Hello</span> <span class="uName">User</span></h2>');
            //$('.user-logged-in .uName').text(userNametxt);            
            $(window).resize(function () {
                $('#navbar .navbar-toggle').on('click', function (e) {
                    $('body').append('<div class="menuSlideOverlay"></div>');
                    $('.welcomeUserMenu').append('<div class="menuSlideClose">X</div>');
                    $('body').addClass('sliderO');
                    if ($('.menuSlideOverlay').length > 0) {
                        $('.menuSlideOverlay').on('click', function (e) {
                            $('#navbar .navbar-collapse').removeClass('in');
                            $('body').removeClass('sliderO');
                            $('.menuSlideOverlay, .menuSlideClose').remove();
                        });
                    }
                });
                $('.menuSlideClose').live('click', function (e) {
                    $('#navbar .navbar-collapse').removeClass('in');
                    $('body').removeClass('sliderO');
                    $('.menuSlideOverlay, .menuSlideClose').remove();
                });                
            });
        });
        /*End Responsive menu*/
    }
    /*End For screen size*/
});