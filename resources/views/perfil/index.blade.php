@extends('Layouts.app')

@section('titulo')
Edita tu perfil: {{auth()->user()->username}}  

@endsection

@section('contenido')
<div class="mt-5"></div>
<div class="md:flex md:justify-center  ">
  
<div class=" md:w-1/2 bg-white shadow p-6">
    <form action="{{ route('perfil.store', ['user' => auth()->user()->username]) }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
  @csrf
    <div class=" mb-5">

        <label for="username" class="mb-2 block uppercase text-gray-500 font-bold "> Nombre de usuario </label>
        
        <input
        id="username"
        name="username"
        type="text"
        placeholder="Tu nombre de usuario"
        class="border p-3 w-full rounded-lg @error('username') border-red-700 @enderror" 
        value="{{ auth()->user()->username}}"
        />
        
        @error('username')
    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
@enderror
        </div>


        
    <div class=" mb-5">

        <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold ">imagen de perfil </label>
        
        <input
        id="imagen"
        name="imagen"
        type="file"
        class="border p-3 w-full rounded-lg " 
        value=""
        accept=".jpg, .jpeg, .png"
        />
        
        <input 
        type="submit"
        value="Guardar cambios"
        class=" bg-purple-700 hover:bg-purple-800 transition-colors cursor-pointer 
        uppercase font-bold text-white rounded-lg w-full p-3 mt-10"
        />
        </div>
   </form>
</div>
   </form>
</div>




</div>
@endsection