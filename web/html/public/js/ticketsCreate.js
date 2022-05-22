$(document).ready(function() {
    getServices();
    getUsers();
})

function getServices() {
    $.ajax({
        url: '/api/services/',
        success : function(response) {
            response.forEach(element => {
                $('#select-services').append(
                    `<option value="${element.id}">${element.name}</option>`
                )
            })
        }
    })
}

function getUsers() {
    let data = [];
    $.ajax({
        url: '/api/getCustomers/',
        success: function(response) {
            response.forEach(element => {
                data.push(element.name);
            })
        }
    })
    $('#customers-input').autocomplete({
        source: data
    })
}