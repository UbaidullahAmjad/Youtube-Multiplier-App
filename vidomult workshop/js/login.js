// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});


// Login Form

$(function() {
    var button = $('#SignUpButton');
    var box = $('#SignUpBox');
    var form = $('#SignUpForm');
    button.removeAttr('href');
    button.mouseup(function(SignUp) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(SignUp) {
        if(!($(SignUp.target).parent('#SignUpButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});