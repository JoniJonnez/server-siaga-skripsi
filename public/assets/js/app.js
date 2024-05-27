! function(t) {
    "use strict";

    function n() {
        t(".slimscroll").slimscroll({
            height: "auto",
            position: "right",
            size: "7px",
            color: "#9ea5ab",
            wheelStep: 5,
            touchScrollStep: 50
        })
    }
    n(), t("#side-nav").metisMenu(), t("#btn-fullscreen").on("click", function(e) {
        e.preventDefault(), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
    }), t(".button-menu-mobile").on("click", function(e) {
        e.preventDefault(), t("body").toggleClass("enlarge-menu"), n()
    }), t(window).width() < 1025 ? t("body").addClass("enlarge-menu") : 1 != t("body").data("keep-enlarged") && t("body").removeClass("enlarge-menu"), t(".left-sidenav a").each(function() {
        var e = window.location.href.split(/[?#]/)[0];
        this.href == e && (t(this).addClass("active"), t(this).parent().addClass("active"), t(this).parent().parent().addClass("in"), t(this).parent().parent().prev().addClass("active"), t(this).parent().parent().parent().addClass("active"), t(this).parent().parent().parent().parent().addClass("in"), t(this).parent().parent().parent().parent().parent().addClass("active"))
    }), t(".search-btn").on("click", function() {
        var e = t(this).data("target");
        e && t(e).toggleClass("open")
    }), t('[data-toggle="tooltip"]').tooltip(), t('[data-toggle="popover"]').popover(), Waves.init()
}(jQuery);