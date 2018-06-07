$( document ).ready(function() {
    if($(window).width()>992){
        $("#slide-out").attr("hidden", "true");
    } else {
        $("#nav-buttons").attr("hidden", "true");
    }
    $( window ).resize(()=>{
        if($(window).width()>992){
            $("#slide-out").attr("hidden", "true");
            $("#nav-buttons").removeAttr("hidden");
        } else {
            $("#slide-out").removeAttr("hidden");
            $("#nav-buttons").attr("hidden", "true");
        }
    });
});