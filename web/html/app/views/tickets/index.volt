{% include 'layouts/navbar.volt' %}
<div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul id="myTab" class="nav flex-column nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link active" href="#content-explore-ticket" aria-selected="true">
                        <span data-feather="explore-ticket"></span>
                        Ticket en cours <span id="count-total"></span> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#content-my-ticket">
                        Mes tickets <span id="count-user"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tickets/create"> + Nouveau Ticket</a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 tab-content">
        <div id="content-explore-ticket" class="tab-pane fade show active align-items-center pt-3 pb-2 mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-stripped">
                        <thead>
                            <th>Ticket</th>
                            <th>Date création</th>
                            <th>Service</th>
                            <th>Client</th>
                            <th>Resumé</th>
                        </thead>
                        <tbody id="tickets-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id = "content-my-ticket" class="tab-pane fade align-items-center pt-3 pb-2 mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-stripped">
                        <thead>
                            <th>Ticket</th>
                            <th>Date création</th>
                            <th>Service</th>
                            <th>Client</th>
                            <th>Resumé</th>
                        </thead>
                        <tbody id="tickets-user-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>