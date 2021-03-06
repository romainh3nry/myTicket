{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update {{userName}}</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="/users/update/{{userId}}" method="post">
        <input type="text" class="form-control" disabled value="{{userId}}">
        {{form.get('username')}}
        {{form.get('email')}}
        <input type="password" class="form-control" value="{{userPassword}}" disabled />
        <a class="m-3 font-italic" href="/users/password/{{userId}}">Cliquez ici pour modifier le mot de passe</a>
        {{form.get('role')}}
        {{form.get('Update')}}
    </form>
    {% if erreurs is defined %}
    <div class="alert alert-danger m-3">{{ erreurs }}</div>
    {% endif %}
    {% if flashSession.has() %}
    <div class="alert alert-success m-3">{{ flashSession.output() }}</div>
    {% endif %}
</div>
