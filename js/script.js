$(document).ready(function() {
    // back to top
    $(".backToTop").click(function(e) {
        //animate smooth scroll to the top
        e.preventDefault();
        $("html, body").animate({
                scrollTop: 0,
            },
            "slow"
        );
    });

    //block searchbar if nothing is typed in
    $("#searchPosts").keyup(function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#searchPostsBtn").attr("disabled", "disabled");
        } else {
            $("#searchPostsBtn").removeAttr("disabled", "disabled");
        }
    });

    //form validation
    $("#contactForm").parsley();
    $("#loginForm").parsley();
    $("#registerForm").parsley();
    $("#changeUsername").parsley();
    $("#changeUserpw").parsley();
    $("#deleteAcc").parsley();
});