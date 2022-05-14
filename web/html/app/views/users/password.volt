{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Update Password</h3>
    <hr />
    <form class="col-lg-6 col-sm-12" action="#" method="post">
        {{form.get('password')}}
        {{form.get('passwordConfirm')}}
        {{form.get('Modifier')}}
    </form>
</div>