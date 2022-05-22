$(document).ready(function() {
    getTickets();
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href")
        console.log(target);
      });
})

function getTickets() {
    displaySpinner('#tickets-list', '5')
    $.ajax({
        url: '/api/tickets',
        success: function(response) {
            $('.spinner-row').remove();
            response.forEach(element => {
                $('#tickets-list').append(
                    `<tr>
                        <td><a href="/tickets/detail/${element.id}">#${element.ticket_id}</a></td>
                        <td>${element.date_creation}</td>
                        <td>${element.service}</td>
                        <td>${element.related_to}</td>
                        <td>${element.title}</td>
                    </tr>`
                )
            });
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