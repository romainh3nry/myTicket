$(document).ready(function() {
    $('#search-user-form').submit(function(e) {
        e.preventDefault();
        $('#search-users-results').empty();
        let search = $('#search-user-input').val();
        findUsers(search)
        $('#search-user-input').val('');
    })
});

function findUsers(search) {
    $.ajax({
        url : '/api/users/' + search,
        method: 'get',
        dataType: 'json',
        success: function(data) {
            data.forEach(element => {
                $('#search-users-results').append(
                    '<tr> \
                    <td>'+ element.username +'</td>\
                    <td>'+ element.email +'</td>\
                    <td>'+ element.role +'</td>\
                    </tr>'
                )
            });
        }
    })
}