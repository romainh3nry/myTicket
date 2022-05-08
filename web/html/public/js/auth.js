$(document).ready(function() {
    $('#checkPassword').on('click', function() {
        input = $('#password');
        if (input.attr('type')==='password') {
            input.attr('type','text');
        } else {
            input.attr('type','password');
        }
    })
})