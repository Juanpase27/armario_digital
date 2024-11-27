<a href="/">Inicio</a>
@auth
    <a href="/dashboard">Dashboard</a>
    <a href="/garments/">Garments</a>
    <a href="/outfits">Outfits</a>
    <a href="/garment_categories">Garment Categories</a>
    <a href="/calendar-events">Calendar Events</a>
    <a href="/notifications">Notifications</a>
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
