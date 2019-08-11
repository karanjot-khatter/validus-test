$(document).ready(function() {
    if (window.location.pathname == '/call.php') {
        $(".callLogo").show();
        $(".dashboard-link").show();
        $(".new-call-link").show();
    }

    $(".new-call-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.dashboard-link');
        var dashboardBody = $('#dashboardBody');
        var callBody = $('#callBody');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).hide();
        $(callBody).show();
    });

    $(".dashboard-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.new-call-link');
        var callBody = $('#callBody');
        var dashboardBody = $('#dashboardBody');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).show();
        $(callBody).hide();

    });

    function clickedProperties(clickedLink)
    {
        $(clickedLink).css('color', 'black');
        $(clickedLink).css('border-bottom', '3px solid');
        $(clickedLink).css('padding-bottom', '1.4rem');
        $(clickedLink).css('border-color', 'darkblue');
        $(clickedLink).prop('disabled', true);
    }

    function nonClickedProperties(nonClickedLink)
    {
        $(nonClickedLink).css('color', 'gray');
        $(nonClickedLink).css('border-bottom', 'none');
        $(nonClickedLink).prop('disabled', false);
    }
});