<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="/" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Inicio</a>
            @auth
                <a href="/dashboard" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Dashboard</a>
                <a href="/garments" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Garments</a>
                <a href="/outfits" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Outfits</a>
                <a href="/garment_categories" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Garment
                    Categories</a>
                <a href="/calendar-events" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Calendar
                    Events</a>
                <a href="/notifications" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Notifications</a>
                <form action="/logout" method="post" style="display: inline">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit()"
                        class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Logout</a>
                </form>
            @else
                <a href="/login" class="text-white hover:bg-gray-700 px-3 py-2 rounded transition">Login</a>
            @endauth
        </div>

        @if (session('status'))
            <span class="text-green-400 ml-4">{{ session('status') }}</span>
        @endif
    </div>
</nav>
