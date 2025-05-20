<!DOCTYPE html>
<html lang="pt-BR" class="bg-gray-50">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bem-vindo ao Amplimed tweets</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
</head>

<body class="min-h-screen flex flex-col justify-center items-center bg-gray-50 px-4">

    <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-md text-center">
    <img src="{{ url("imgs/amplimed.png")}}" class=" w-80 mx-auto" alt="">
        <h1 class="text-2xl font-bold text-purple-700 mb-4">Bem vindo ao amplimed tweets</h1>
        <p class="text-gray-700 mb-6">
            Seja bem-vindo ao amplimed, a plataforma de microblogging que conecta você a uma comunidade vibrante de
            pessoas apaixonadas por compartilhar ideias e experiências.
        </p>

        <a href="{{ route('login') }}"
            class="inline-block bg-purple-600 hover:bg-purple-800 text-white font-semibold px-8 py-3 rounded-lg shadow transition focus:outline-none focus:ring-2 focus:ring-purple-400">
            Entrar
        </a>

        <p class="mt-6 text-gray-600 text-sm">
            Ainda não tem uma conta?
            <a href="{{ route('register') }}" class="text-purple-600 hover:underline font-semibold">
                Cadastre-se aqui
            </a>
        </p>
    </div>
    @livewireScripts
    <footer class="mt-12 text-gray-400 text-sm">
        &copy; {{ date('Y') }} Amplimed. Todos os direitos reservados.
    </footer>

</body>

</html>