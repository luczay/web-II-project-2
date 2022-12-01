$(document).ready(function(e) {
    $('#submit_btn').click(function() {
        get_utazasok();
        return false;
    });

    $.post('/utazas/index.php?arfolyamok', {start_date: '2022-11-05', end_date: '2022-11-20', currency_names: 'EUR'}, function(respond) {
        $('#today').text(respond[1]);
    });
});