<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
  public function store(Request $request, Post $post)
  {
      $user = $request->user();
  
      if ($post->likes()->where('user_id', $user->id)->exists()) {
          // El usuario ya ha dado like, así que eliminamos el like existente
          $post->likes()->where('user_id', $user->id)->delete();
      } else {
          // El usuario no ha dado like, así que creamos un nuevo like
          $post->likes()->create([
              'user_id' => $user->id,
          ]);
      }
  
      return back();
  }
  

       
    

    public function destroy(Request $request, Post $post)
       {
     $request->user()-> likes()->where('post_id', $post->id)->delete();

     return back();
       }
}
