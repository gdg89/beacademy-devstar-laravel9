<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;




class UserController extends Controller
{
    public function __construct(User $user)//llamando o model
    {
        $this->model = $user;
    }
    public function index()//exibiendo todos os usuarios na tela.
    {
        $users = User::all();// llamada da tabela do model User
        return view ('users.index', compact('users')); //pasamos el nome da variavel no comando compact, y el sera renderizado en la view.
    }

    public function show($id)//exibiendo usuario na tela
    {
        //$user = User::find($id);//buscando en el banco de dados;
        
        // otra forma de busqeuda utilizando o eloquent -- $user = User::where('id',$id)->first();

         if(!$user = User::find($id)){
            return redirect()->route('users.index');//Se nao achar o usuario vai redireccionar para a view index
        }
           
         $title='Usuario '. $user->name;//titulo dinamico// recupera nombre del model user.
        
        return view('users.show', compact('user','title'));  
    }


    public function create()
    {
        
       return view('users.create');
    }


    public function store(Request $request)//criando request do formulario
    {
        //enviando para o banco
         // forma 1:
            // $user = new User;
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = bcrypt($request->password);//encriptar senha com bcrypt.
            // $user->save();

        //forma 2, utilizando llamada do model da function _construct:

            $data= $request->all();// data recebe tudo do request.
            $data['password'] =bcrypt($request->password);// se $data tiver password, tratamos com bcrypt.

            $this-> model -> create($data);

            return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$user= $this->model->find($id)){
            return redirect()->route('users.index');
        }
        
        return view('users.edit',compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        if(!$user= $this->model->find($id)){// si el request no encontrar usuario redirecciona al index
            return redirect()->route('users.index');
        }
        $data = $request-> only('name','email');// data recibe nombre e email del request

        if($request-> password){//  se el request tiene password, data tambien recibe el password.
            $data['password']= bcrypt($request->password);// tratando el password recibido.
        }

        $user->update($data);//modificando las informaciones del user, enviando las info atribuidas al data.

        return redirect()->route('users.show', $user->id);// redireccionando al usuario modificado, pasando la view y el id.
    }

    public function destroy($id)
    {
        if(!$user= $this->model->find($id)){// si el request no encontrar usuario redirecciona al index
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');

    }

}
