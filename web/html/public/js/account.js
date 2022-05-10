$(document).ready(function() {
    $('#search-user-form').submit(function(e) {
        e.preventDefault();
        let search = $('#search-user-input').val();
        findUsers(search)
    })
});

function findUsers(search) {
    $.ajax({
        url : '/api/users/' + search,
        method: 'get',
        dataType: 'json',
        success: function(data) {
            data.forEach(element => {
                $('#search-users-results').append('<li>' + element.username + '</li>')
            });
        }
    })
}