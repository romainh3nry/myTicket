$(document).ready(function() {
    $('#search-user-form').submit(function(e) {
        e.preventDefault();
        $('#search-users-results').empty();
        let search = $('#search-user-input').val();
        findUsers(search)
        $('#search-user-input').val('');
    })

    $('#search-customer-form').submit(function(e) {
        e.preventDefault();
        $('#search-customers-thead').remove();
        $('#search-customers-results').empty();
        $('#search-customers-table').prepend(
            `<thead id="search-customers-thead">
                <tr class="text-center">
                    <th>Name</td>
                    <th>Email</td>
                    <th>Tel</td>
                    <th>Action</th>
                </tr>
            </thead>`
        )
        let search = $('#search-customer-input').val();
        let results = [search, search.toUpperCase(), toUpperCaseEachFirstLetter(search)]
        $('#search-customer-input').val('');
        displaySpinner('#search-customers-results', '3');
        results.forEach(element => {
            findCustomers(element);
        });
    })
});

function toUpperCaseEachFirstLetter(string) {
    let arr = string.split(" ");
    for (var i = 0; i < arr.length; i++) {
        arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
    }
    return arr.join(" ");
}

function displaySpinner(parent, colspan) {
    $(parent).append(
        `<tr class="spinner-row">\
            <td class="text-center" colspan=${colspan}>\
                <div class="spinner-grow text-warning" role="status"> \
                    <span class="sr-only">Loading...</span> \
                </div>\
            </td>\
        </tr>`
    )
}

function findCustomers(search) {
    $.ajax({
        url: '/api/customers/' + search,
        method: 'get',
        dataType: 'json',
        success: function(data) {
            $('.spinner-row').remove();
            data.forEach(element => {
                $('#search-customers-results').append(
                    `<tr class="text-center">
                        <td>${element.name}</td>
                        <td>${element.email}</td>
                        <td>${element.tel}</td>
                        <td><a href="/customers/update/${element.id}"><button class="btn btn-sm">Modifier</button></a></td>
                    </tr>`
                )
            })
        }
    })
}

function findUsers(search) {
    displaySpinner('#search-users-results', '4');
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