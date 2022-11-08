<!DOCTYPE html>
<html lang="fr">
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

    @yield('extra-style')

<div style="display:none">
    {{$user = Auth::user()}}
</div>


    

<div class="flex flex-col bg-black text-white">
    <div class="bg-black h-20 flex justify-evenly items-center border-b-2 border-orange-500">

        <div class="hover:-rotate-6">
            <a class="p-3 border-2 border-black rounded-lg  hover:border-orange-500  hover:text-orange-500 " href="{{ route('home') }}" >Accueil</a>
            
            
        </div>

        <div class="hover:-rotate-6">
            <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ route('Apropos') }}">A propos</a>
        </div>
        
        <div>
            <img class="w-24 h-24 relative  z-10" src="{{ asset('storage/public/logo/logo_sans_titre_white_.png') }}" alt="">
        </div>

        <div class="hover:-rotate-6">
            <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ route('cart') }}">Panier <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{ Cart::count() }}</span></a>
        </div>
    
        
        @auth
            @if (Auth::user()->is_admin)
            <div class="flex ">
                <div>
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ Route('admin')}}">{{ Auth::user()->name }}</a>
                </div>
                
                <div>
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ Route('logout')}}">Deconnexion</a>
                </div>
                
            </div>
            @else
            <div class="flex">
                <div>
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ route('user', $user)}}">{{ Auth::user()->name }}</a>
                </div>
                <div>
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ Route('logout')}}">Deconnexion</a>
                </div>
                
                
            </div>
            @endif
            
        @else
            <div class="flex">
                <div class="hover:-rotate-6">
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ route('login') }}">Connexion</a>
                </div>
                <div class="hover:-rotate-6">
                    <a class="p-3 border-2 border-black rounded-lg hover:border-orange-500 hover:border-2 hover:text-orange-500" href="{{ route('register') }}">Inscription</a>
                </div>
                
                
            </div>
        @endauth
    </div>
    
    @if (session('success'))
        <div class="bg-green-500 mt-10 mb-10 w-1/4 mx-auto rounded-lg flex justify-center">
            {{ session('success') }}
        </div>
    @endif



    @if (session('danger'))
        <div class="bg-red-700 mt-10 mb-10 w-1/4 mx-auto flex justify-center rounded-lg">
            {{ session('danger') }}
        </div>
    @endif


    
    @yield('content')

        
    
    
    
    <div class="bg-black pt-12 flex justify-evenly items-center border-t-2 border-orange-500">
        <div>
            <ul>
                <li class="mb-5"><a href="">Découvrez notre page Facebook !</a></li>
                <li class="mb-5"><a href="">Suivez-nous sur Instagram !</a></li>
                <li class="mb-5"><a href="">Suivez-nous sur Twitter !</a></li>
                <li class="mb-5"><a href="">Suivez-nous sur Discord !</a></li>
            </ul>
        </div>

        <div>
            <img class="w-52 h-52 relative  z-10" src="{{ asset('storage/public/logo/logo_black_mode_.png') }}" alt="">
        </div>

        <div>
            <ul>
                <li class="mb-5">Tel : 07.57.83.48.69</li>
                <li class="mb-5">Email : vkg.maker3d@gmail.com</li>
                <li class="mb-5">Mention Légale</li>
                <li class="mb-5">Propulsé par Boxydev</li>
            </ul>
        </div>
    </div>

</div>


    @yield('extra-js')
    @vite('resources/js/app.js')
</body>
</html>