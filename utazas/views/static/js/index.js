$(document).ready(function(e) {
    $('#submit_btn').click(function() {
        get_utazasok();
        return false;
    });

    $.post('/index.php?get_sessions', {}, function(respond) {
        var respond_as_json = JSON.parse(respond);
        if (respond_as_json.userloginname != '') {
            $('#login').css('display', 'none');
            $('#register').css('display', 'none');
            user_details(respond_as_json.userid, respond_as_json.userfirstname, respond_as_json.userlastname, respond_as_json.userloginname);
            $('#logout').css('display', 'flex');
        } else {
            $('#login').css('display', 'flex');
            $('#login').css('display', 'flex');
            $('#logout').css('display', 'none');
        }
    });
});

function get_utazasok() {
    var orszag = $('#orszag').val();
    $.post('/index.php?tavaszi_utazasok', {orszag: orszag}, function(respond) {
        var respond_as_json = JSON.parse(respond);
        $('#results_table').append('<tr><th>Szálloda neve</th>' 
                                    + '<th>Csillag</th>'
                                    + '<th>Reptér távolság</th>'
                                    + '<th>Tenger távolság</th>'
                                    + '<th>Félpanzió</th>'
                                    + '<th>Indulás</th>'
                                    + '<th>Időtartam</th>'
                                    + '<th>Ár</th>'
                                    + '<th>Ország</th></tr>');
        for (let i = 0; i < Object.keys(respond_as_json).length; i++) {
            if (respond_as_json[i].felpanzio == 1) {
                felpanzio = 'Igen';
            } else {
                felpanzio = 'Nem';
            }
            $('#results_table').append('<tr>'
                                        + '<td>' + respond_as_json[i].nev + '</td>'
                                        + '<td>' + respond_as_json[i].besorolas + '</td>'
                                        + '<td>' + respond_as_json[i].repter_tav + '</td>'
                                        + '<td>' + respond_as_json[i].tengerpart_tav + '</td>'
                                        + '<td>' + felpanzio + '</td>'
                                        + '<td>' + respond_as_json[i].indulas + '</td>'
                                        + '<td>' + respond_as_json[i].idotartam + '</td>'
                                        + '<td>' + respond_as_json[i].ar + '</td>'
                                        + '<td>' + respond_as_json[i].orszag + '</td>'
                                        +'</tr>');
        }
    });
};

function user_details(id, firstname, lastname, loginname) {
    $('#user_table').append('<tr>'
                                + '<td>' + id + '</td>'
                                + '<td>' + firstname + '</td>'
                                + '<td>' + lastname + '</td>'
                                + '<td>' + loginname + '</td>'
                                +'</tr>');
}