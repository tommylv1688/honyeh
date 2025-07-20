$(window).scroll(function() {
    //- nav fixed
    if ($('#nav').offset().top > 50) {
        $('.nav-menu').addClass("top-nav-collapse");
    } else {
        $('.nav-menu').removeClass("top-nav-collapse");
    }
    //- gotop
    if ($('body').scrollTop() > 200) {
        $('#gotop').fadeIn(500);
    } else {
        $('#gotop').fadeOut(300);
    }
});

//- Animate the scroll to top
$('#gotop').click(function(event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 300);
});

//- drop
var drop = $("li.hsSub");
drop.on('click', function(e) {
    e.preventDefault();
    var thisParent = $(this);
    drop.each(function() {
        $(this).not(thisParent).removeClass('is-active');
    });
    thisParent.toggleClass('is-active');
});

//- mixitup
$('#Container').mixItUp();

//- bxslider
$(document).ready(function(){
  $('.bxslider').bxSlider();
});

//- menu for mob
var drop = $("#btn-nav");
var nav = $(".nav-menu");
drop.on('click', function (event) {
    nav.toggleClass('is-active');
});