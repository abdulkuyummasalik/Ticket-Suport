<nav class="bg-white shadow">
    <div class="container mx-auto py-3 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">
            Ticket Support
        </div>
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('ticket_types.index') }}" class="text-gray-600 hover:text-gray-900">Tipe Tiket</a>
            <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-gray-900">Project</a>
            <a href="{{ route('tickets.index') }}" class="text-gray-600 hover:text-gray-900">Ticket</a>
        </div>
        <button class="md:hidden text-gray-600 focus:outline-none" id="menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <div class="hidden md:hidden" id="mobile-menu">
        <a href="{{ route('ticket_types.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Tipe Tiket</a>
        <a href="{{ route('projects.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Project</a>
        <a href="{{ route('tickets.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Ticket</a>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
