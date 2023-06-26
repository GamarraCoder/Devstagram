@extends('layouts.app')

@section('titulo')
 Registro
@endsection

@section('contenido')
    <div class=" md:flex  md:justify-center  p-12  md:gap-10 items-center">

<div class=" md:w-1/2 ">
<img src={{ asset('img/registrar.jpg') }} alt="img-registro"  >
</div>  <!--imagen aqui-->

<div class=" md:w-1/2 p-6 bg-white  rounded-lg shadow-xl " >
<form action="/register" method="POST">
@csrf
<div class="mb-5">

<label for="name" class="mb-2 block uppercase text-gray-500 font-bold  "> Nombre </label>

<input
id="name"
name="name"
type="text"
placeholder="Tu nombre"
class="border p-3 w-full rounded-lg @error('name') border-red-700 @enderror" 
value="{{ old("name")}}"
>


@error('name')
    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
@enderror


</div>



    
    
    <div class=" mb-5">

        <label for="username" class="mb-2 block uppercase text-gray-500 font-bold "> Nombre de usuario </label>
        
        <input
        id="username"
        name="username"
        type="text"
        placeholder="Tu nombre de usuario"
        class="border p-3 w-full rounded-lg @error('username') border-red-700 @enderror" 
        value="{{ old("username")}}"
        />
        
        @error('username')
    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
@enderror
        </div>


        <div class=" mb-5">

            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold "> Email </label>
            
            <input
            id="email"
            name="email"
            type="email"
            placeholder="ejemplo@ejemplo.com"
            class="border p-3 w-full rounded-lg @error('email') border-red-700 @enderror" 
            value="{{ old("email")}}"
            
            />
            
            @error('email')
    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
@enderror
            </div>


            <div class=" mb-5">

                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold "> contraseña </label>
                
                <input
                id="password"
                name="password"
                type="password"
                placeholder="********"
                class="border p-3 w-full rounded-lg @error('password') border-red-700 @enderror" 
               
                
                />
                
                @error('password')
    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
@enderror
                </div>


                <div class=" mb-5">

                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold "> confirmar contraseña </label>
                    
                    <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="********"
                    class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-700 @enderror" 
                  
                    
                    />
                    @error('password')
                    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> {{$message}} </p>
                @enderror
                    </div>

        <input
        type="submit"
        value="Crear cuenta"
        class=" bg-purple-700 hover:bg-purple-800 transition-colors cursor-pointer 
        uppercase font-bold text-white rounded-lg w-full p-3"
        />
       
</form>
</div>

    </div> <!-- md:flex-->
@endsection