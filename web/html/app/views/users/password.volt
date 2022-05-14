{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update Password</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="/users/password/{{userId}}" method="post">
        {{form.get('password')}}
        {{form.get('passwordConfirm')}}
        {{form.get('Modifier')}}
    </form>
    {% if erreurs is defined %}
        <div class="alert alert-danger m-3">{{ erreurs }}</div>
    {% endif %}
</div>