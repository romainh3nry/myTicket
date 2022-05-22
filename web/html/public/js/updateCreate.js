$(document).ready(function() {
    getUpdate($('#hiddenId').val());
    postUpdate();
})

function postUpdate() {
    $('#createUpdateForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#hiddenId').val();
        let update = $('#updateInput').val()
        $.ajax({
            url:"/api/createUpdate/",
            method: "POST",
            data: {ticket_id: id, update: update},
            success: function(response) {
                $('#updateInput').val('');
                getUpdate(id);
            }
        })
    })
}

function getUpdate(ticket_id) {
    $('#update-row').empty();
    $.ajax({
        url: `/api/updates/${ticket_id}`,
        method: 'get',
        success: function(response) {
            response.forEach(element => {
                $('#update-row').append(
                    `<div class="update-bubble">
                        <table class="table table-update">
                            <tr>
                                <td>
                                    ${element.date_creation}
                                    <hr />
                                    ${element.update}
                                </td>
                            </tr>
                        </table>
                    </div>`
                )
            });
        }
    })
}