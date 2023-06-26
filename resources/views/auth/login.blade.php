@extends('layouts.app')

@section('titulo')
 Inicia sesion en Devstagram
@endsection

@section('contenido')
    <div class=" md:flex  md:justify-center  p-12  md:gap-10 items-center ">

<div class=" md:w-1/2 ">
<img src={{ asset('img/login.jpg') }} alt="img-login-usuarios"  >
</div>  <!--imagen aqui-->

<div class=" md:w-1/2 p-6 bg-white  rounded-lg shadow-xl " >
<form method="POST" action= "{{ route('login') }} " novalidate  >
@csrf

@if (session('mensaje'))
    

    <p class="bg-red-700 text-white  rounded-lg  p-3 text-center my-2 "> 
        
        {{session('mensaje')}} </p>

    
@endif


<div class="mb-5">


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


               
                    
                    </div>

                    <div class=" mb-5">
                        <input type="checkbox" name="remember"> <label class=" text-gray-500  text-sm">Mantener sesion abierta</label>
                                    </div>
                        

        <input
        type="submit"
        value="Iniciar Sesion"
        class=" bg-purple-700 hover:bg-purple-800 transition-colors cursor-pointer 
        uppercase font-bold text-white rounded-lg w-full p-3"
        />

</form>
</div>

    </div> <!-- md:flex-->

   
@endsection