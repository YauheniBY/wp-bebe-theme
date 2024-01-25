/* Background Awesomeness
/* ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## */
jQuery(function($) {
    "use strict";

    var $window = $(window);
    var $stars1 = $('#stars1'); // Smaller
    var $stars2 = $('#stars2'); // Bigger
    var $cloud1 = $('#cloud1'); // Cloud Left 1
    var $cloud2 = $('#cloud2'); // Cloud Left 2
    var $cloud3 = $('#cloud3'); // Cloud Left 3
    var $cloud4 = $('#cloud4'); // Cloud Right 1
    var $cloud5 = $('#cloud5'); // Cloud Right 2

    $(window).scroll(function()
    {
        var yPos = -($window.scrollTop());

        // Stars
        $stars1.css({ top: (0   + (yPos / 8)) + 'px' });
        $stars2.css({ top: (0   + (yPos / 3 )) + 'px' });

        // Clouds Left
        $cloud1.css({ top: (10  + (yPos )) + 'px' });
        $cloud2.css({ top: (190 + (yPos )) + 'px' });
        $cloud3.css({ top: (410 + (yPos )) + 'px' });

        // Clouds Right
        $cloud4.css({ top: (0   + (yPos )) + 'px' });
        $cloud5.css({ top: (290 + (yPos )) + 'px' });
    });

    /* Scroll To Top
        /* ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## */
        $("a[href='#top']").on('click',function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

        /* Drop Menu
        /* ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## */

        $('.ul-drop > li').on('click',function(){
            $(this).children('ul').toggle({display: "toggle"});
        });

        $('.drop-menu > a').on('click',function(){
            $(this).parents('div').children('.ul-drop').toggle({display: "toggle"});
        });

        if($('#slider').length){
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                nextText: "",
                prevText: ""
            }); 
        }       

        if( $('#photo-gallery').length){
            $('#photo-gallery').flexslider({
                animation: "slide",
                controlNav: false,
                nextText: "",
                prevText: ""
            });
        }   
        
        if($('#about-slider').length){
                $('#about-slider').flexslider({
                animation: "fade",
                controlNav: false,
                nextText: "",
                prevText: ""
            });
        }

        if($('#room-slider').length){
            $('#room-slider').flexslider({
                animation: "fade",
                controlNav: false,
                nextText: "",
                prevText: ""
            });
        }

        if($('#gallery-slider').length){
            $('#gallery-slider').flexslider({
                animation: "fade",
                controlNav: true,
                nextText: "",
                prevText: ""
            });
        }
        

});