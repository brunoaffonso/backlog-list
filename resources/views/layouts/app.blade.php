<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Backlog de Tarefas')</title>
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <script src="{{ asset('build/assets/app.js') }}" defer></script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-teal-700 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Backlog de Tarefas</h1>
            <div>
                <a href="{{ route('tasks.index') }}" class="bg-orange-900 text-white px-4 py-2 rounded hover:bg-orange-800 mr-2">
                    Tarefas
                </a>
                <a href="{{ route('categories.index') }}" class="bg-orange-900 text-white px-4 py-2 rounded hover:bg-orange-800 mr-2">
                    Categorias
                </a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6 flex-grow mb-10">
        @yield('content')
    </main>

    <footer class="bg-teal-800 text-white py-2 fixed bottom-0 w-full">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Backlog de Tarefas. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>
