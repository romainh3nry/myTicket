$(document).ready(function() {
    $('#search-user-form').submit(function(e) {
        e.preventDefault();
        $('#search-users-results').empty();
        let search = $('#search-user-input').val();
        findUsers(search)
        $('#search-user-input').val('');
    })
});

function displaySpinner() {
    $('#search-users-results').append(
        '<tr>\
            <td class="text-center" colspan="4">\
                <div class="spinner-grow text-warning" role="status"> \
                    <span class="sr-only">Loading...</span> \
                </div>\
            </td>\
        </tr>'
    )
}

function findUsers(search) {
    displaySpinner();
    $.ajax({
        url : '/api/users/' + search,
        method: 'get',
        dataType: 'json',
        success: function(data) {
            $('#search-users-results').empty()
            data.forEach(element => {
                $('#search-users-results').append(
                    `<tr>
                        <td>${element.username}</td>
                        <td>${element.email}</td>
                        <td>${element.role}</td>
                        <td>
                            <button class="btn btn-sm">
                                <a class="text-light" href="/users/update/${element.id}">Modifier</a>
                            </button>
                        </td>
                    </tr>`
                )
            });
        },
        error: function(xhr, textStatus, error) {
            $('#search-users-results').empty()
            $('#search-users-results').append(
                `<tr> \
                    <td class="text-center" colspan="4">
                        <div class="alert alert-danger">Erreur :  ${xhr.statusText}</div>
                    </td>\
                </tr>`
            )
        }
    })
}