<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class RegisterController extends Controller
{
    //
    public function index () 
    
    {
        return view('auth.register');
    }
    
    public function store (Request $request)
    {
    //    dd($request);

    //Modificar el request 
    $request-> request->add(['username' => Str::slug($request-> username) ]);

    //Validacion
 $this-> validate($request, [

    'name' => ["required", "max:20"],
    'username' => ["required", "unique:users", "min:3", "max:20"],
    'email' => ["required", "unique:users", "max:30"],
     'password' => ["required", "confirmed", "min:6"]

     
 ]);


 User::create([
    'name' => $request-> name, 
    'username' => $request-> username,
    'email' => $request-> email, 
    'password' => Hash::make($request-> password)
 ]);

 //autenticar
auth() -> attempt ([
"email" => $request -> email,
"password" => $request -> password

]);





 //redireccionar
 return redirect() -> route('post.index', auth()->user()->username);

    }
}
