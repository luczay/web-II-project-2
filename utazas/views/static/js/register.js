$(document).ready(function(e) {
    $('#submit_btn').click(function() {
        register();
        return false;
    });
});

function register() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var uname = $('#uname').val();
    var password = $('#password').val();

    $.post('/index.php?register', {first_name: first_name, last_name: last_name, uname: uname, password: password}, function(respond) {
        var respond_as_json = JSON.parse(respond);
        alert(respond_as_json.response);
        if (respond_as_json.to_main_page == 1) {
            window.location.href = '/';
        }
    });
}