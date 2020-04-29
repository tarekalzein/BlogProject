$(document).ready(function()
{
    // Code to autoload first tab in the dashboard page:

    //The following code is to toggle the menu button on and off when using smaller screens.
    $('.menu_button').on('click',function()
    {
        $('.nav').toggleClass('showing');
    });

    //Slick carousel post gallery - Credits: https://kenwheeler.github.io/slick/
    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
    });


});

