$(function () {
    $('#topmenu a').on('mouseover', function () {
        var data = $(this).text();
        $('#empty'). text(data);
    });
    $('.card-header').click(function () {
        $('nav').hide (2000, function () {
            $(this).show(200);

        });

    });
});
