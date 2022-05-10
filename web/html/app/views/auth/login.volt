    <div class="form-block">
      <h3>Authentification</h3>
      <form action="/auth/login" method="post">
        {{form.get('username')}}
        {{form.get('password')}}
        <div class="d-flex justify-content-end align-items-center">{{form.get('checkPassword')}}<span class="ml-1">Show password</span></div>
        {{form.get('Connexion')}}
      </form>
      {% if flashSession.has() %}
      <div class="alert alert-danger text-center m-2 w-100">{{ flashSession.output() }}</div>
      {% endif %}
    </div>
