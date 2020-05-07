$(document).ready(function()
{
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
        responsive: [{
            breakpoint:1600, //tablet
            settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                dots:true,
            }
        }]
    });


});
//Generates error but is working flawlessly...some bug in the CKEditor and this promise callback...couldn't find solution.
ClassicEditor
    .create( document.querySelector( '#content' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                {model: 'heading3', view: 'h3',title: 'Heading 3', class:'ck-heading_heading3'}
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

//TEST
