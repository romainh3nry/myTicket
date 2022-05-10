{% include 'layouts/navbar.volt' %}

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item nav-border">
        <a class="nav-link nav-link-sized active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Résumé du compte</a>
    </li>
    <li class="nav-item nav-border">
        <a class="nav-link nav-link-sized" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modification du compte</a>
    </li>
     {% if user.role == 'admin' %}
     <li class="nav-item nav-border">
        <a class="nav-link nav-link-sized" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Administration</a>
    </li>
     {% endif %} 
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container container-centered">
            <h4>Information du compte</h4>
            <hr />
            <li><span>ID</span> : {{user.id}}</li>
            <li><span>Username</span> : {{user.username}}</li>
            <li><span>Email</span> : {{user.email}}</li>
            <li><span>Niveau d'accès</span> : {{user.role}}</li>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">MODIF</div>
    {% if user.role == 'admin' %}
    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
        <div class="container container-centered">
            <h4>Administration</h4>
            <hr />
            <div class="row">
                <div class="col-4">
                    <form id="search-user-form" action="#" method="post" class="form-inline">
                        <input id="search-user-input" class="form-control" name="search" placeholder="Rechercher un utilisateur" />
                        <button id="search-user-button" type="submit" class="btn ml-2">Recherche</button>
                    </form>
                </div>
                <div class="col-8">
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
    {% endif %}
</div>