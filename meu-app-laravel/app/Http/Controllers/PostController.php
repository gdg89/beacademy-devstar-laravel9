<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Post;



class PostController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(User $user, Post $post )// recuperando models.
    {
        $this->user=$user;
        $this->post=$post;
    }

    public function index()// exibira todos os posts do usuario, relacionamento um para muitos.
    {
        // if(!$user=$this->user->find($userId)){
        //     return redirect()->back();
        // }
       
        $posts = $this->post->all();
    

        return view('posts.index', compact('posts'));
    }

    public function show($userId)
    {
        if(!$user=$this->user->find($userId)){
            return redirect()->back();
        }
        $posts = $user->posts()->get();
        return view('posts.show', compact('user','posts'));
    }
}
