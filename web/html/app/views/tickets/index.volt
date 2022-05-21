{% include 'layouts/navbar.volt' %}
<div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#content-explore-ticket">
                        <span data-feather="home"></span>
                        Tous les tickets <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#content-my-ticket">
                        <span data-feather="home"></span>
                        Mes tickets
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 tab-content">
        <div id="content-explore-ticket" class="tab-pane fade content-index align-items-center pt-3 pb-2 mb-3">
            1
        </div>
        <div id = "content-my-ticket" class="tab-pane fade content-index align-items-center pt-3 pb-2 mb-3">
            2
        </div>
    </main>
</div>