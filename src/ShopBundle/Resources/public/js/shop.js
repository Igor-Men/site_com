$(document).ready(function () {
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });

    setTimeout(function(){
        $('#myModal').modal();
    }, 60000);
});