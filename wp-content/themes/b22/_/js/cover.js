/*!
 * Change background image on hover
 */


// remap jQuery to $
(function($){})(window.jQuery);



var $fourth = $('#fourth');

$fourth.on({
    mouseenter:function(){
        $body.addID( "fourth" );
    },
    mouseleave:function(){
        $body.removeID( "fourth" );
    }
});


var $fifth = $('#fifth');

$fifth.on({
    mouseenter:function(){
        $body.addClass( "fifth" );
    },
    mouseleave:function(){
        $body.removeClass( "fifth" );
    }
});

/*!
 * Scroll page when filtering projects
 */


$(function() {
    $("#first").on("hover", function() {
        $("body").animate({"scrollTop": window.scrollY-300}, 1000);
        return false;
    });
});