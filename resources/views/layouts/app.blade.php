<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App | @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center px-4">
            <a href="{{ route('todos.index') }}" class="text-xl font-bold">To-Do App</a>
            {{-- <a href="{{ route('todos.create') }}" class="px-4 py-2 bg-white text-blue-600 rounded-lg">+ Add To-Do</a> --}}
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-6 px-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 mt-10 text-gray-600">
        &copy; {{ date('Y') }} To-Do App. All rights reserved.
    </footer>

</body>
</html>