$(document).ready(function(){
    if (window.location.pathname == '/call.php') {
        $(".callLogo").show();
        $(".dashboard-link").show();
        $(".new-call-link").show();
    }

    $(".new-call-link").click(function (e) {
        var dashboard= $('.dashboard-link');
        e.preventDefault();
        $(dashboard).css('color', 'gray');
        $(dashboard).css('border-bottom', 'none');
        $(this).css('color', 'black');
        $(this).css('border-bottom', '3px solid');
        $(this).css('padding-bottom', '1.4rem');
        $(this).css('border-color', 'darkblue');

    });


});