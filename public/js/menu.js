/**
 * Created by Felipe on 13/07/2016.
 */
$(function() {
    var path = window.location.pathname;
    path = path.substr(0, window.location.pathname.length-1);
    path = path.split("/");
    var route = path.pop();
    $(".nav .active").removeClass("active");
    $(".nav #"+route).addClass("active");
});