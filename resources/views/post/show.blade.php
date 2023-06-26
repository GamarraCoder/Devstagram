@extends('Layouts.app')

@section('titulo')
Titulo de la publicacion: {{ $post->titulo }}
@endsection


@section('contenido')


<div class="container mx-auto md:flex justify-center">
   
<div class="md:w-1/2 px-10 mt-10"> 
<img src=" {{asset('uploads') . '/' . $post->imagen    }} " alt="imagen post {{$post->titulo}}">


  @auth
    
  @if ($post->checkLike(auth()->user() ))
 

  <div class="p-2 flex items-center gap-4">
    @method('DELETE')
    <form method="POST" action="{{route('posts.likes.destroy', $post)}}" >
        @csrf
        <div class="my-4">
            <button type="submit"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                  
    </button>
    </div>
    </form>
    
   
@else

    
<div class="p-2 flex items-center gap-4">
<form method="POST" action="{{route('posts.likes.store', $post)}}">
    @csrf
    <div class="my-4">
        <button type="submit"> 
  <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
</svg>

</button>
</div>
</form>

@endif
  



    <p class="font-bold "> {{$post->likes->count() }} 
        <span class="font-normal">Likes</span>
    </p>
    
  


</div>

 
@endauth

<p class="font-bold"> {{$post->user->username}} </p>

<p class="">

    {{$post->descripcion}}
</p>



<p class="text-sm text-gray-500 ">
    {{$post->created_at->diffForHumans()}}
</p>


@auth
   
@if ($post->user_id === auth()->user()->id)
    
<form action=" {{route('post.destroy', $post)}} " method="POST">

    @method('DELETE')

    @csrf

    <input type="submit"
    value="elimar publicacion"
    class=" bg-red-600 hover:bg-red-700 p-2 rounded text-white font-bold mt-1 cursor-pointer "

    />

</form>

@endif
@endauth
</div>

<div class="md:w-8/12 p-10 mt-10"> 

<div class="shadow bg-white p-5 mb-5 ">
    <p class="text-3xl  text-center mb-10 font-bold  text-gray-600  bg-gradient-to-r from-purple-500 to-pink-500 text-transparent bg-clip-text ">Agrega un nuevo comentario</p>

    @if (session('mensaje'))
        <div class=" bg-green-500 p-2 rounded-lg mb-6 text-white text-center  uppercase font-bold">
            {{session('mensaje')}}
        </div>
    @endif
    <form action="{{route('comentarios.store' ,   ['post' => $post, 'user' => $user  ] )}}" method="POST">
        @csrf
        <div class="mb-5">

            @auth
            <label for="comentario" class="mb-10 block uppercase text-gray-500 font-bold">Añade un comentario</label>
            <textarea
                id="comentario"
                name="comentario"
                placeholder="Agrega un comentario"
                class="border p-3 w-full rounded-lg @error('descripcion') border-red-700 @enderror"
                ></textarea>
            @error('comentario')
                <p class="bg-red-700 text-white rounded-lg p-3 text-center my-2">{{ $message }}</p>
            @enderror
        </div>


        <input
        type="submit"
        value="comentar"
        class=" bg-purple-700 hover:bg-purple-800 transition-colors cursor-pointer 
        uppercase font-bold text-white rounded-lg w-full p-3"
        />
</form>
@endauth


<div class="bg-white  shodow mb-5 max-h-96 overflow-y-scroll mt-10">

    @if (isset($post->comentarios) && $post->comentarios->count())
 

   
    @foreach ($post->comentarios as $comentario)
    <div class="p-5 border-gray-300 border-b">
        <a href="{{route('post.index', $comentario->user )}}" class="font-black">
            {{$comentario->user->username}}
        </a>
        <p>
            {{$comentario->comentario}}
        </p>

        <p class="text-sm text-gray-500">
            {{$comentario->created_at->diffForHumans()}}
        </p>
    </div>
@endforeach


@else
    <p class="p-10 text-center">No hay comentarios disponibles</p>
@endif


</div>


</div>

</div>

</div>

@endsection 


{{-- @extends('Layouts.app')

@section('titulo')
{{ $post->titulo }}
@endsection


@section('contenido')

<div class="container mx-auto flex">

    <div class="md:w-1/2 px-10 ">
        <img src=" {{asset('uploads') . '/' . $post->imagen    }} " alt="imagen post {{$post->titulo}}">
    </div>


    <div class="md:w-1/2 ">
           2
    </div>

</div>
@endsection --}}