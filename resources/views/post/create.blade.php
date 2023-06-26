@extends('Layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


<div class="mt-10"></div>
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10 mt-10 md:mt-0">
        <form action="{{route('imagenes.store')}}"  method="POST" enctype="multipart/form-data" 
        id="dropzone" class="dropzone border-dashed border-2 w-full h-96 
        rounded flex flex-col justify-center items-center">
        @csrf
    </form>
     
       
    </div>
   
    <div class="md:w-1/2 p-10 mt-10 md:mt-0 bg-white rounded-lg shadow-xl max-w-[480px] mx-auto">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                <input
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Título de la publicación"
                    class="border p-3 w-full rounded-lg @error('titulo') border-red-700 @enderror"
                    value="{{ old('titulo') }}"
                >
                @error('titulo')
                    <p class="bg-red-700 text-white rounded-lg p-3 text-center my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder="Descripción de la publicación"
                    class="border p-3 w-full rounded-lg @error('descripcion') border-red-700 @enderror"
                    >{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="bg-red-700 text-white rounded-lg p-3 text-center my-2">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="mb-5 ">

                <input 
                
                name="imagen"
                type="hidden"
                value="{{old('imagen')}}"


              >

              @error('imagen')
              <p class="bg-red-700 text-white rounded-lg p-3 text-center my-2">{{ $message }}</p>
          @enderror

            </div>
            
        <input
        type="submit"
        value="Crear Publicacion"
        class=" bg-purple-700 hover:bg-purple-800 transition-colors cursor-pointer 
        uppercase font-bold text-white rounded-lg w-full p-3"
        />

        </form>
    </div>
</div>
@endsection
