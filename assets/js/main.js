$(document).ready(function() {

    var dashboardLink = $(".dashboard-link");
    var callLink =  $(".new-call-link");

    if ($("#welcomeBody" ).length > 0) {
        $(".callLogo").hide();
        $(dashboardLink).hide();
        $(callLink).hide();
    }

    $(dashboardLink).click(function () {
        var clickedLink = $(this);
        var nonClickedLink = $(".new-call-link");
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
    });

    $(callLink).click(function() {
        var nonClickedLink = $(".dashboard-link");
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
    });

    $('#calculate').click(function () {
        // alert('test');

        var form = $("#callform");

        $(form).submit();


        $(this).css('background-color', 'gray');
        $(this).prop('disabled', true);

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