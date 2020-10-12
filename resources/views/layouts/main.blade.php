<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video catalogue</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="font-sans text-white  bg-gray-900">
    <div id="app">
        <nav  class="border-b border-gray-800">
            <div class="container flex flex-col md:flex-row items-center mx-auto px-4 py-6 justify-between">
                <ul class="flex items-center flex-col md:flex-row">
                    <svg class="w-70 h-8" viewBox="0 0 70 16" class="bi bi-film" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
                        <text font-size="11" transform="translate(10 0)">
                            <tspan x="10" y="12">Catalogue</tspan>
                        </text>
                    </svg>
                    <li class="md:ml-10 mt-2 md:mt-0">
                        <a href="#">TV Show</a>
                    </li>
                    <li class="md:ml-16 mt-2 md:mt-0">
                        <a href="#">Movies</a>
                    </li>
                    <li class="md:ml-16 mt-2 md:mt-0">
                        <a href="#">Actors</a>
                    </li>
                </ul>
                <div class="flex flex-col md:flex-row items-center">
                    <div class="relative">
                        <input class="mt-2 md:mt-0 w-64 rounded-full focus:outline-none focus:shadow-outline 
                        px-4 pl-6 py-1 bg-gray-800 text-sm"
                        type="text" placeholder="Search">
                        <div class="absolute top-0">
                            <svg class="w-4 mt-4 md:mt-2 ml-2 fill-current text-gray-500" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="md:ml-4 mt-2 md:mt-0">
                        <!-- Authentication Links -->
                        @guest
                            <ul class="flex items-center flex-col md:flex-row">
                                <li class="md:ml-2 mt-2 md:mt-0">
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="md:ml-4 mt-2 md:mt-0">
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            </ul>
                        @else
                            <account-dropdown></account-dropdown>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        
        @yield('content')

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-8 text-gray-400">
                @Copyright 2020
            </div>
        </footer>
    </div>
</body>
</html>