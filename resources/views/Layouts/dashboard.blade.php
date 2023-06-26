@extends('Layouts.app')

@section('titulo')
Perfil: {{ strtolower($user->username) }}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:6/12 px-5 mt-10 flex flex-col items-center">
            <img src="{{ $user->imagen ? asset('perfiles') . '/' .$user->imagen : asset('img/usuario.svg') }}" alt="imagen de usuario" /> 
        </div>
        <div class="sm:w-8/12 lg:6/12 px-5 flex flex-col items-center justify-center md:items-start py-10 md:py-10">
            
            <div class="flex gap-2 items-center">
            <p class="text-gray-800 text-3xl">{{ $user->username }}</p>

            @auth
            
            @if ($user->id === auth()->user()->id)
               
                   
            <a 
                href="{{ route('perfil.index', ['user' => auth()->user()->username]) }}"
            class="text-gray-700 hover:text-gray-800 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  
            </a>

            @endif
            
            @endauth
        </div>

            <p class="text-gray-800 text-sm font-bold mb-3 mt-5">
                {{$user->followers->count()}}
                <span class="font-normal text-center">@choice('Seguidor|Seguidores', $user->followers->count())</span>
            </p>
            <p class="text-gray-800 text-sm font-bold mb-3">
                {{$user->followings->count()}}
                <span class="font-normal text-center">Siguiendo</span>
            </p>
            <p class="text-gray-800 text-sm font-bold mb-3">
               {{$user->posts->count()}}
                <span class="font-normal">Publicaciones</span>
            </p>
           

            @auth
              @if ($user->id !== auth()->user()->id)
              @if (!$user->siguiendo(auth()->user()))      
            
              <form action="{{ route('users.follow',$user) }}" method="POST">
                @csrf
                <input type="submit" class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Seguir">
            </form>
            @else
             
           
            <form action="{{ route('users.unfollow',$user) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer mt-1" value="Dejar de seguir">
            </form>
   
            @endif  
@endif
    @endauth
  
   
        </div>
    </div>
</div>
<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center my-10 font-black bg-gradient-to-r from-purple-500 to-pink-500 text-transparent bg-clip-text">Publicaciones</h2>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user  ])}}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de posts">
                </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Publicaciones</p>
    @endif
</section>
@endsection
