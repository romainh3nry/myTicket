{% include 'layouts/navbar.volt' %}

<h3>home</h3>
{{session.get('auth_id')['role']}}