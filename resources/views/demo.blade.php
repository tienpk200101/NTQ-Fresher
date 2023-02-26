@include('layouts.header')
{{ $msg }}

<div class="demo-account">
  <p class="user-name">
    <label>User name:</label>
    <span>{{ $demo_account['email'] }}</span>
  </p>
  <p class="pass">
    <label>Password:</label>
    <span>{{ $demo_account['password'] }}</span>
  </p>
</div>
@include('layouts.footer')