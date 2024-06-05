<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<!-- arquivo css publico para gerenciar alterações de design -->
<link rel="stylesheet" href="{{ asset('css/taskmanager.css') }}">

<div class="bg-gray-800 text-white flex justify-between items-center py-4 px-8">
    <div class="flex items-center">
        <img class="h-12 w-auto mr-4" src="https://via.placeholder.com/150" alt="Logo">
        <span class="text-xl font-bold">Task Manager</span>
    </div>
    <nav>
        <ul class="flex space-x-4">
            <li>
                <a href="#" class="hover:text-gray-200">Dashboard</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-200">Posts</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-200">Pages</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-200">Users</a>
            </li>
        </ul>
    </nav>
</div>
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