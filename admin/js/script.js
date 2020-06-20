$(document).ready(function() {
    //Hover animation on post
    $('.card').hover(
        function() {
            $(this).addClass('shadow')
        },
        function() {
            $(this).removeClass('shadow')
        }
    );
});