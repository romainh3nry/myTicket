{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update customer {{customerName}}</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="/users/update/{{userId}}" method="post">
        <input class="form-control" type="text" value="{{customerId}}" disabled />
        {{form.get('name')}}
        {{form.get('email')}}
        {{form.get('tel')}}
        {{form.get('Modifier')}}
    </form>
</div>
