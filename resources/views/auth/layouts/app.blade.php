<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App | @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Main Content -->
    <div class="container mx-auto mt-6 px-4">
        @yield('content')
    </div>

</body>
</html>