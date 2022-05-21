{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update service {{service.name}}</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="/services/update/{{service.id}}" method="post">
        <input class="form-control m-3" placeholder="ID" value="{{service.id}}" name="id" disabled />
        <input class="form-control m-3" placeholder="Name" value="{{service.name}}" name="name" />
        <button class="btn btn-block m-3" type="submit">Valider</button>
        {% if flashSession.has() %}
            <div class="alert alert-success m-3 w-100">{{flashSession.output()}}</div>
        {% endif %}
    </form>
</div>