/* 
 * Contact page JS
 */



$(document).ready(function() { 
    
    // On 'Call me' click, show the phone no
    $('#contactform-callme').click(function () {
        if ($('#contactform-callme').is(':checked')) {
            $('.field-contactform-phone_no').hide().removeClass('hide').fadeIn(1000);
        } else {
            $('.field-contactform-phone_no').fadeOut(1000);
        }
    });
    
});


