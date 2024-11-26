<a href="/">Inicio</a>
@auth
    <a href="/dashboard">Dashboard</a>
    <a href="/garments/index">Garments</a>
    <form action="/logout" method="post" style="display: inline">
        @csrf
        <a href="#" onclick="this.closest('form').submit()">Logout</a>
    </form>
@else
    <a href="/login">Login</a>
@endauth

@if (session('status'))
    <br>
    {{ session('status') }}
@endif
