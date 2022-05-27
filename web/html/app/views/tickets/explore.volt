{% include 'layouts/navbar.volt' %}

<div class="container-fluid">
    <table class="table mt-5">
        <thead>
            <tr>
                <th>N° Ticket</th>
                <th>Date de création</th>
                <th>Date de cloture</th>
                <th>Service</th>
                <th>Client</th>
                <th>Auteur</th>
                <th>Statut</th>
                <th>Sévérité</th>
                <th>Résumé</th>
            </tr>
        </thead>
        <tbody>
            {% for ticket in tickets %}
                {% if ticket.state == 1 and ticket.severity == 'CRITIQUE' %}
                <tr class="alert alert-danger">
                {% elseif ticket.state == 1 and ticket.severity == 'MAJEUR' %}
                <tr class="alert alert-warning">
                    {% elseif ticket.state == 1 and ticket.severity == 'MINEUR' %}
                <tr class="alert alert-success">
                {% else %}
                <tr class="alert alert-secondary">
                {% endif%}
                    <td><a href="/tickets/detail/{{ticket.id}}">{{ticket.ticket_id}}</a></td>
                    <td>{{ticket.date_creation}}</td>
                    <td>{{ticket.date_closure}}</td>
                    <td>{{ticket.Services.name}}</td>
                    <td>{{ticket.Customers.name}}</td>
                    <td>{{ticket.Users.username}}</td>
                    {% if ticket.state == 1 %}
                    <td>Ouvert</td>
                    {% else %}
                    <td>Fermé</td>
                    {% endif %}
                    <td>{{ticket.severity}}</td>
                    <td>{{ticket.title}}</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
</div>