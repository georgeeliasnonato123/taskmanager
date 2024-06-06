
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/taskmanager.css') }}">

<div class="bg-blue-500 text-white flex justify-between items-center py-4 px-8">
    <div class="flex items-center">
        <img class="h-12 w-auto mr-4" src="{{ asset('images/logo.png') }}" alt="Logo">
        <span class="text-xl font-bold">Task Manager</span>
    </div>
    <div class="md:hidden">
        <!-- Botão do menu "hamburger" para telas móveis -->
        <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none focus:text-white">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M4 6h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm16 5H4a1 1 0 1 1 0-2h16a1 1 0 1 1 0 2zm0 4H4a1 1 0 1 1 0-2h16a1 1 0 1 1 0 2z"></path>
            </svg>
        </button>
    </div>
    <nav id="desktop-menu" class="hidden md:flex space-x-4">
        <ul class="flex space-x-4">
            <li>
                <a href="#" class="flex items-center hover:text-gray-200">
                    <i class="fas fa-tasks mr-2"></i>
                    Tarefas
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center hover:text-gray-200">
                    <i class="fas fa-list-ul mr-2"></i>
                    Categorias
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center hover:text-gray-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Menu para dispositivos móveis -->
<nav id="mobile-menu" class="hidden md:hidden bg-blue-500">
    <ul class="flex flex-col space-y-4 p-4">
        <li>
            <a href="#" class="flex items-center hover:text-gray-200">
                <i class="fas fa-tasks mr-2"></i>
                Tarefas
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center hover:text-gray-200">
                <i class="fas fa-list-ul mr-2"></i>
                Categorias
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center hover:text-gray-200">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Login
            </a>
        </li>
    </ul>
</nav>

<!-- para retornar as messages do controller do app -->
@if(session('success'))
<div class="bg-green-500 text-white rounded-lg p-4 mb-4">
    {{ session('success') }}
    <button class="delete" onclick="closeNotification(this)"></button>
</div>
@endif

@if(session('error'))
<div class="bg-red-500 text-white rounded-lg p-4 mb-4">
    {{ session('error') }}
    <button class="delete" onclick="closeNotification(this)"></button>
</div>
@endif

<!-- java script -->
<script src="{{ asset('js/menu.js') }}"></script>
<script src="{{ asset('js/taskmanager.js') }}"></script>
