<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
   

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        if(auth()->user()->id == $post->user_id){
            return true;
        }else{
            return false;
        };
    }

}


