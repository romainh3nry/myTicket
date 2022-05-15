{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update customer {{customerName}}</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="/customers/update/{{customerId}}" method="post">
        <input class="form-control" type="text" value="{{customerId}}" disabled />
        {{form.get('name')}}
        {{form.get('email')}}
        {{form.get('tel')}}
        {{form.get('Modifier')}}
    </form>
    {% if erreurs is defined %}
    <div class="alert alert-danger">{{erreurs}}</div>
    {% endif %}
</div>
