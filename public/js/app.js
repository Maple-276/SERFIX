$(function(){
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $(".navbar-collapse").toggleClass("show");
    });

    $(window).resize(function(e) {
        if($(window).width()<=768){
            $(".navbar-collapse").removeClass("show");
        }else{
            $(".navbar-collapse").addClass("show");
        }
    });

    // Toggle dark mode
    $("#toggle-dark-mode").click(function() {
        $("body").toggleClass("dark-mode");
        if ($("body").hasClass("dark-mode")) {
            $("#dark-mode-icon").removeClass("fa-moon").addClass("fa-sun");
        } else {
            $("#dark-mode-icon").removeClass("fa-sun").addClass("fa-moon");
        }
    });
});