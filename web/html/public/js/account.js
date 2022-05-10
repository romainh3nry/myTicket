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
                    `<tr> \
                    <td>${element.username}</td>\
                    <td>${element.email}</td>\
                    <td>${element.role}</td>\
                    <td><button class="btn btn-sm"><a class="text-light" href="/users/update/${element.id}">Modifier</a></button></td>\
                    </tr>`
                )
            });
        },
        error: function(xhr, textStatus, error) {
            $('#search-users-results').append(
                `<tr> \
                <td class="text-center" colspan="4"><div class="alert alert-danger">Erreur :  ${xhr.statusText}</div></td>\
                </tr>`
            )
        }
    })
}