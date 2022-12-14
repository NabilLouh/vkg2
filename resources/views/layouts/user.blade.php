<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VKG</title>

    @vite('resources/css/app.css')
</head>
<body>

    <div style="display:none">
        {{$user = Auth::user()}}
    </div>

<div class="flex flex-col bg-gray-600 justify-between min-h-screen ">
    <div class="flex justify-between items-center h-20  border-b-2 border-black">
        <h1 class="mx-3">Mon profil</h1>
    
       
            
        <div class="ml-2 mx-3">
            <a href="{{ route('user', $user)}}">{{ Auth::user()->name }}</a>
            <a href="{{ Route('logout')}}">Deconnexion</a>
        </div>
        
    </div>
    
    
    
    <div class="flex">
        <div class="flex flex-col bg-gray-400 rounded-r-lg mt-5 mb-5">
            <a href="{{ route('user', $user) }}" class=" mx-3 h-20 flex items-center">Mes informations</a>
            <a href="{{ route('user.show', $user) }}" class=" mx-3 h-20 flex items-center">Mes Commandes</a>
            <a href="{{ route('user.histo', $user) }}" class=" mx-3 h-20 flex items-center">Historique</a>
            <a href="{{ route('home') }}" class=" mx-3 h-20 flex items-center">Accueil</a>
        </div>
    
    
        <div class="bg-gray-300 rounded-lg w-4/5 m-auto mt-5 mb-5">
    
            @yield('content')
    
    
        </div>
    </div>
    
    
    
    <footer>
    
        Footer
    </footer>
</div>



    
</body>
</html>