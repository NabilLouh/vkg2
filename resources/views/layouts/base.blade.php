<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('extra-meta')
    <title>VKG</title>


    @yield('extra-script')


    @vite('resources/css/app.css')
</head>
<body id="app">

<div style="display:none">
    {{$user = Auth::user()}}
</div>


    

<div class="flex flex-col bg-purple-300 justify-between min-h-screen">
    <div class="bg-purple-300 h-20 flex justify-evenly items-center border-b-2 border-black">

        <div>
            <a href="{{ route('home') }}">Accueil</a>
            
            
        </div>

        <div>
            <a href="{{ route('Apropos') }}">A propos</a>
        </div>
        
        <div>
            <img class="w-32 h-32" src="{{ asset('storage/public/logo/logo_black_mode_.png') }}" alt="">
        </div>

        <div>
            <a href="{{ route('cart') }}">Panier <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{ Cart::count() }}</span></a>
        </div>
    
        
        @auth
            @if (Auth::user()->is_admin)
            <div>
                <a href="{{ Route('admin')}}">{{ Auth::user()->name }}</a>
                <a href="{{ Route('logout')}}">Deconnexion</a>
            </div>
            @else
            <div>
                <a href="{{ route('user', $user)}}">{{ Auth::user()->name }}</a>
                <a href="{{ Route('logout')}}">Deconnexion</a>
            </div>
            @endif
            
        @else
            <div>
                <a href="{{ route('login') }}">Connexion</a>
                <a href="{{ route('register') }}">Inscription</a>
            </div>
        @endauth
    </div>
    
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif



    @if (session('danger'))
        <div>
            {{ session('danger') }}
        </div>
    @endif
    
    @yield('content')

        
    
    
    
    <div class="bg-purple-300 h-20 flex justify-between items-center border-t-2 border-black">
        footer
    </div>

</div>


    @yield('extra-js')
    @vite('resources/js/app.js')
</body>
</html>