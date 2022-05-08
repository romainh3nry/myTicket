<div class="container">
    <div class="form-block">
      <h3>Authentification</h3>
      <form action="#" method="post">
        {{form.get('username')}}
        {{form.get('password')}}
        <div class="d-flex justify-content-end align-items-center">{{form.get('checkPassword')}}<span class="ml-1">Show password</span></div>
        {{form.get('Connexion')}}
      </form>
    </div>
</div>