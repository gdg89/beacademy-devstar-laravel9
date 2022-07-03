<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;




class UserController extends Controller
{
    public function index()
    {
        $users = User::all();// llamada da tabela do model User
        return view ('users.index',compact('users')); //pasamos el nome da variavel no comando compact, y el sera renderizado en la view.
    }

    public function show($id)
    {
        //$user = User::find($id);//buscando en el banco de dados;
        
        // otra forma de busqeuda utilizando o eloquent -- $user = User::where('id',$id)->first();

        if(!$user = User::find($id)){
            return redirect()->route('user.index');//Se nao achar o usuario vai redireccionar para a view index
        }

        return view('users.show',compact('user'));
    }

}
