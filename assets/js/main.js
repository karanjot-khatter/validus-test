$(document).ready(function() {

    if ($("#fund-info" ).length > 0) {
        $(".callLogo").show();
        $(".dashboard-link").show();
        $(".new-call-link").show();
    }

    $(".new-call-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.dashboard-link');
        var dashboardBody = $('.dashboard-body');
        var callBody = $('.new-call-body');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).hide();
        $(callBody).show();
    });

    $(".dashboard-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.new-call-link');
        var callBody = $('.new-call-body');
        var dashboardBody = $('.dashboard-body');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).show();
        $(callBody).hide();

    });

    function clickedProperties(clickedLink)
    {
        $(clickedLink).css('color', 'black');
        $(clickedLink).css('border-bottom', '3px solid #4472C4');
        $(clickedLink).css('padding-bottom', '1.4rem');
        $(clickedLink).prop('disabled', true);
    }

    function nonClickedProperties(nonClickedLink)
    {
        $(nonClickedLink).css('color', 'gray');
        $(nonClickedLink).css('border-bottom', 'none');
        $(nonClickedLink).prop('disabled', false);
    }
});