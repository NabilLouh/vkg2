<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VKG</title>

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
            <img class="w-32 h-32" src="{{ asset('storage/covers/logo_black_mode_.png') }}" alt="">
        </div>

        <div>
            <a href="{{ route('login') }}">Nous contacter</a>
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
    
    
    
    @yield('content')

        
    
    
    
    <div class="bg-purple-300 h-20 flex justify-between items-center border-t-2 border-black">
        footer
    </div>

</div>


    @vite('resources/js/app.js')
</body>
</html>