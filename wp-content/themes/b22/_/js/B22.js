/*!
 * Change background image on hover
 */


// remap jQuery to $
(function($){})(window.jQuery);

//Preload Images
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-1.jpg').load(function(){
        $('body').append($(this));
    });
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-2.jpg').load(function(){
        $('body').append($(this));
    });
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-3.jpg').load(function(){
        $('body').append($(this));
    });
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-4.jpg').load(function(){
        $('body').append($(this));
    });
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-8.jpg').load(function(){
        $('body').append($(this));
    });
    $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/11/018PR_8297FR-LQ.jpg').load(function(){
        $('body').append($(this));
    });


//Define Variables
var $item = $('.item');

var $intro = $('.intro');
var $body = $('.body');
var $first = $('#first');
var $two = $('#second');
var $three = $('#third');
var $four = $('#fourth');
var $five = $('#fifth');
var $six = $('.six');


/*
//Hide everything but item hovered
$item.on({
    mouseenter:function(){
        $intro.css({opacity:0});
        $item.not(this).css({opacity:0});
        $first.css({opacity:1})
    },
    mouseleave:function(){
        $intro.css({opacity:1}).removeAttr('style');
        $item.css({opacity:1}).removeAttr('style');
    }
});
*/


//First:hover
    $('#first').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/12/B22-1.jpg")');
    }, function() {
        $('body').css('background', '');
    });

//Second:hover
    $('#second').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/12/B22-2.jpg")');
    }, function() {
        $('body').css('background', '');
    });

//Third:hover
    $('#third').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/12/B22-3.jpg")');
    }, function() {
        $('body').css('background', '');
    });

//Fourth:hover
    $('#fourth').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/12/B22-4.jpg")');
    }, function() {
        $('body').css('background', '');
    });

//Fifth:hover
    $('#fifth').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/12/B22-8.jpg")');
    }, function() {
        $('body').css('background', '');
    });

//Sixth:hover
    $('#sixth').hover(function() {
        $('body').css('background-image', 'url("http://www.b22.it/web/wp-content/uploads/2015/11/018PR_8297FR-LQ.jpg")');
    }, function() {
        $('body').css('background', '');
    });


//Tag cloud animation
//Define variables

    var $term = $("#tax_cloud a.tax_term");
    var $tax_cloud = $("#tax_cloud");
    var $all_projects = $("#navbar li.current_page_item a");

//Click taxonomy to add "margin_10" class to #tag_cloud

$term.on({
    click:function(){
        $tax_cloud.addClass( "margin_10" );
    },
});

//Click "All Projects" to remove "margin_10" class from #tag_cloud

$all_projects.on({
    click:function(){
        $tax_cloud.removeClass( "margin_10" );
    }
});