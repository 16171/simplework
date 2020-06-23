$(function () {
    $('#parse_onliner').click (function() {
        console.log('ok');
        $.ajax({
            type:'post',
            url:'/ajax/parse/onliner_product',
            beforeSend:function () {
                $('#empty').text('Идет парсинг onliner.by');
            },
            success:function (data) {
                $('#parse_empty').html (data);
            }
        });
    });
});

