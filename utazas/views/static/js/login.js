$(document).ready(function(e) {
    $('#submit_btn').click(function() {
        login();
        return false;
    });
});

function login() {
    var uname = $('#uname').val();
    var password = $('#password').val();

    $.post('/index.php?login', {uname: uname, password: password}, function(respond) {
        var respond_as_json = JSON.parse(respond);
        alert(respond_as_json.response);
        if (respond_as_json.to_main_page == 1) {
            window.location.href = '/';
        }
    });
}