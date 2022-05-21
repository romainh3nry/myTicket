{% include 'layouts/navbar.volt' %}

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item nav-border">
        <a class="nav-link nav-link-sized active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Résumé du compte</a>
    </li>
     {% if user.role == 'admin' %}
     <li class="nav-item nav-border">
        <a class="nav-link nav-link-sized" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Administration</a>
    </li>
     {% endif %} 
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
        <div class="container container-centered">
            <h4>Information du compte</h4>
            <hr />
            <li><span>ID</span> : {{user.id}}</li>
            <li><span>Username</span> : {{user.username}}</li>
            <li><span>Email</span> : {{user.email}}</li>
            <li><span>Niveau d'accès</span> : {{user.role}}</li>
        </div>
    </div>
    {% if user.role == 'admin' %}
    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
        <div class="container container-centered">
            <h4>Administration</h4>
            <hr />
            <ul class="nav nav-tabs" id="myTabAdmin" role="tablist">
                <li class="nav-item nav-border">
                    <a class="nav-link nav-link-sized active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Utilisateurs</a>
                </li>
                 <li class="nav-item nav-border">
                    <a class="nav-link nav-link-sized" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">Customers</a>
                </li>
                <li class="nav-item nav-border">
                    <a class="nav-link nav-link-sized" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabAdminContent">
                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                    <div class="container container-centered">
                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <form id="search-user-form" action="#" method="post" class="form-inline">
                                    <input id="search-user-input" class="form-control" name="search" placeholder="Rechercher un utilisateur" />
                                    <button id="search-user-button" type="submit" class="btn ml-2">Recherche</button>
                                </form>
                            </div>
                            <div class="col-lg-8">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-users-results">
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
                    <div class="container container-centered">
                        <div class="row mt-5">
                            <div class="col-12">
                                <form id="search-customer-form" action="#" method="post" class="form-inline row">
                                    <input id="search-customer-input" type="text" class="form-control col-lg-5 col-md-12 col-sm-12" placeholder="Rechercher un client"/>
                                    <button type="submit" class="btn col-lg-2 col-md-12 m-1">Rechercher</button>
                                    <button type="button" class="btn col-lg-2 col-md-12 m-1"><a class="link-secondary" href="/customers/create"> + Nouveau client</a></button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <table id="search-customers-table" class="table table-striped m-0 p-0">
                                    <tbody id="search-customers-results">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                    <div class="container container-centered">Services</div>
                </div>
            </div>
        </div>
    </div>
    {% endif %}
</div>