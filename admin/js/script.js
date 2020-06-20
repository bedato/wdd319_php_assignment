$(document).ready(function() {
    //form validation
    $("#adminLogin").parsley();

    //Hover animation on posts
    $('.postCard').hover(function() {
        // over
        $(this).addClass('bg-dark');
        $(this).addClass('text-white');
    }, function() {
        $(this).removeClass('bg-dark');
        $(this).removeClass('text-white');
    });
});