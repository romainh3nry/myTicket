{% include 'layouts/navbar.volt' %}
<div class="container">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column nav-tabs">
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link active" href="#content-resume-ticket">
                            <span data-feather="explore-ticket"></span>
                            Résumé du ticket <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#content-contact">
                            Détail contact client
                        </a>
                    </li>
                    {% if ticket.state == 1 %}
                    <li id="closure-ticket-button" class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#content-closure">
                            Clôturer le ticket
                        </a>
                    </li>
                    {% endif %}
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 tab-content mt-5">
            <div id="content-resume-ticket" class="tab-pane fade show active align-items-center">
                <div class="row">
                    <div class="col-lg-2">
                        <h5>Resumé</h5>
                    </div>
                    <hr />
                    <div class="col-lg-12 block-ticket mt-2">
                        <table class="table m-0 p-0">
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
                                {% if ticket.state != 2 %}
                                <tr>
                                    <th scope="row">Date de clôture</th>
                                    <td>{{ticket.date_closure}}</td>
                                </tr>
                                {% endif %}
                                <tr>
                                    <th scope="row">Service</th>
                                    <td>{{ticket.Services.name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sévérité</th>
                                    <td>{{ticket.severity}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Client</th>
                                    <td>{{ticket.Customers.name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Statut</th>
                                    {% if ticket.state == 1 %}
                                    <td>Ouvert</td>
                                    {% else %}
                                    <td>Fermé</td>
                                    {% endif %}
                                </tr>
                                <tr>
                                    <th scope="row">Resumé</th>
                                    <td>{{ticket.message}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Updates</th>
                                    <td id="update-row">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {% if ticket.state == 1 %}
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h5>Ajouter un commentaire</h5>
                        <form id="createUpdateForm">
                            <input id="hiddenId" type="text" value="{{ticket.id}}" disabled hidden />
                            <textarea required id="updateInput" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button class="btn btn-block mt-2" type="submit">Update</button>
                        </form>
                        <hr />
                    </div>
                </div>
                {% endif %}
            </div>
             <div id="content-contact" class="tab-pane fade align-items-center pt-3 pb-2 mb-3">
                <div class="col-lg-12 block-ticket mt-2">
                    <table class="table m-0 p-0">
                        <tbody>
                            <tr>
                                <th scope="row">Client</th>
                                <td>{{ticket.Customers.name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ticket.Customers.email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Telephone</th>
                                <td>{{ticket.Customers.tel}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="content-closure" class="tab-pane fade align-items-center pt-3 pb-2 mb-3">
                <div class="p-5 col-lg-12 block-ticket mt-2">
                    <div class="row">
                        <h5 class="col">Etes-vous sûr(e) de vouloir clôturer ce ticket ?</h5>
                    </div>
                    <div class="row">
                        <a href="/tickets/closure/{{ticket.id}}"><button class="btn m-3">Confirmer</button></a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>