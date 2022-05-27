$(document).ready(function() {
    getTickets();
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        let target = $(e.target).attr("href")
        if (target === '#content-my-ticket')
        {
            if (!$('.isDisplayed').length)
            {
                getCurrentUserTickets()
            }
        }
    });

    $('#search-ticket-form').on('submit', function(e) {
        e.preventDefault();
        let search = $('#search-ticket-input').val();
        if ($('#search-ticket-table').length) {
            $('#search-ticket-table').remove()
        }
        $.ajax({
            url: `/api/search/${search}`,
            success: function(response) {
                $('#search-ticket-results').append(
                    `<table id='search-ticket-table' class='table table-stripped'>
                        <thead>
                            <th>Ticket</th>
                            <th>Date création</th>
                            <th>Service</th>
                            <th>Client</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th>Resumé</th>
                        </thead>
                        <tbody id="search-ticket-body"></tbody>`
                )
                response.forEach(element => {
                    $('#search-ticket-body').append(`
                        <tr>
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.author}</td>
                            <td>${element.state ? 'Ouvert' : 'Fermé'}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                })
            }
        })
    });
})

function getCurrentUserTickets() {
    displaySpinner('#tickets-user-list', '5')
    $.ajax({
        url: '/api/ticketsByUser',
        success: function(response) {
            $('#tickets-user-list').empty()
            $('.spinner-row').remove();
            response.forEach(element => {
                if (element.severity === 'MINEUR')
                {
                    $('#tickets-user-list').append(
                        `<tr class="alert alert-secondary isDisplayed">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
                else if (element.severity === 'MAJEUR') {
                    $('#tickets-user-list').append(
                        `<tr class="alert alert-warning">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
                else if (element.severity === 'CRITIQUE') {
                    $('#tickets-user-list').append(
                        `<tr class="alert alert-danger">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
            })
        }
    })
}

function getTickets() {
    displaySpinner('#tickets-list', '5')
    $.ajax({
        url: '/api/tickets',
        success: function(response) {
            $('#count-total').append(`(${response[1].count_total})`)
            $('#count-user').append(`(${response[1].count_user})`)
            $('.spinner-row').remove();
            response.forEach(element => {
                if (element.severity === 'MINEUR')
                {
                    $('#tickets-list').append(
                        `<tr class="alert alert-secondary">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
                else if (element.severity === 'MAJEUR') {
                    $('#tickets-list').append(
                        `<tr class="alert alert-warning">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
                else if (element.severity === 'CRITIQUE') {
                    $('#tickets-list').append(
                        `<tr class="alert alert-danger">
                            <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                            <td>${element.date_creation}</td>
                            <td>${element.service}</td>
                            <td>${element.related_to}</td>
                            <td>${element.title}</td>
                        </tr>`
                    )
                }
            });
        },
        error: function() {
            $('#tickets-list').append(
                `<tr>
                    <td colspan='5'>Une erreur est survenue</td>
                </tr>`
            )
        } 
    })
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