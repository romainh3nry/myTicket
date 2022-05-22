{% include 'layouts/navbar.volt' %}
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Ticket</th>
                        <td>#{{ticket.ticket_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Auteur</th>
                        <td>{{ticket.Users.username}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date de création</th>
                        <td>{{ticket.date_creation}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Service</th>
                        <td>{{ticket.Services.name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Client</th>
                        <td>{{ticket.Customers.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6"></div>
    </div>
</div>