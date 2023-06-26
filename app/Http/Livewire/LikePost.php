<?php

namespace App\Http\Livewire;

use Livewire\Component; 


//Por implementar: Interaccion en Liveware para que se vea interactivo cuando ....
//el usuario de like y no simplemente se vea esa animacion que se ve 


// class LikePost extends Component
// {

// public $post;
// public $isLiked;
// public function like()
// {

//       if ($this->post->checkLike(auth()->user() )){

//         $this->post->likes()->where('post_id', $this->post->id)->delete();

     



//       }
//       else{



//         $user = auth()->user();
  
//         if ($this->post->likes()->where('user_id', $user->id)->exists()) {
//             // El usuario ya ha dado like, así que eliminamos el like existente
//             $this->post->likes()->where('user_id', $user->id)->delete();
//         } else {
//             // El usuario no ha dado like, así que creamos un nuevo like
//             $this->post->likes()->create([
//                 'user_id' => $user->id,
//             ]);
//         }


//       }
      
// }

//     public function render()
//     {
//         return view('livewire.like-post');
//     }
// }
