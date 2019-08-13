$(document).ready(function() {

    if ($("#fund-info" ).length > 0) {
        $(".callLogo").show();
        $(".dashboard-link").show();
        $(".new-call-link").show();
        $('.commitment-table').hide();

    }

    $(".new-call-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.dashboard-link');
        var dashboardBody = $('.dashboard-body');
        var callBody = $('.submit-form-fields');
        var commitmentTable = $('.commitment-table');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).hide();
        $(callBody).show();
        $(commitmentTable).show();
    });

    $(".dashboard-link").click(function (e) {
        e.preventDefault();
        var nonClickedLink = $('.new-call-link');
        var callBody = $('.submit-form-fields');
        var dashboardBody = $('.dashboard-body');
        var commitmentTable = $('.commitment-table');
        var clickedLink = $(this);
        clickedProperties(clickedLink);
        nonClickedProperties(nonClickedLink);
        $(dashboardBody).show();
        $(callBody).hide();
        $(commitmentTable).hide();

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

    $('#callform').submit( function (e) {
        // alert('test'); //popup twice...?  maybe label and input gets called on click!
        e.preventDefault();
        var submitButton =  $('input#calculate');
        $(submitButton).prop('disabled', true);
        $(submitButton).css('background-color', 'gray');
        $(".hidden-commitment-columns").show();
        $.ajax({
            dataType: 'json',
            async: true,
            data: $('#callform').serialize(),
            success: function(data) {
                // console.log('data');
            }
        });
    });
});