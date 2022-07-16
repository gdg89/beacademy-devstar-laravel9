<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUpdateUserFormRequest;




class UserController extends Controller

{
    //MODEL CALL
    public function __construct(User $user)//llamando o model
    {
        $this->model = $user;
    }

    // INDEX USER
    public function index(Request $request)//exibiendo todos os usuarios na tela.//recibimos un request.
    {
        
        //$users = User::all();// llamada da tabela do model User

        //Se tiver uma psqeuisa de usuario, aplicar model getUsers.
        $users = $this->model->getUsers(
            $request->search??''//se tiver request aplicar search, senao fica vacio.
        );
      
       return view ('users.index', compact('users')); //pasamos el nome da variavel no comando compact, y el sera renderizado en la view.
    }

    //EXIBIR USUARIO INDIVIDUAL
    public function show($id)//exibiendo usuario na tela
    {
        //$user = User::find($id);//buscando en el banco de dados;
        
        // otra forma de busqeuda utilizando o eloquent -- $user = User::where('id',$id)->first();

         if(!$user = User::find($id)){
            return redirect()->route('users.index');//Se nao achar o usuario vai redireccionar para a view index
        }

        $user->load('teams');//carregando o relacionamento, chamando o model teams.
        $title='Usuario '. $user->name;//titulo dinamico// recupera nombre del model user.
        
        //  $team = Team::find(1);//relacionamento de cuantos usuarios con un team y cuantos teeams para un usuario.
        //  $team->load('users');
        //     return $team;
         return view('users.show', compact('user','title'));  
    }

    //CRIAR USUARIO
    public function create()
    {
        
       return view('users.create');
    }

    //RECUPERA DADOS DO FORM E ENVIA PRO DB
    public function store(StoreUpdateUserFormRequest $request)//criando request do formulario
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

            if($request->image){//Se request tiver image rodar condição.
                $file = $request['image']; //$file recebe na pocsição image, o $request na poscição image.
            $path =$file->store('profile','public');// Salva o arquivo criando a pasta profile dentro da pasta public.(rodar comando php artisan storage:link)
            $data['image']= $path;// salva no banco o camino gerado pelo store.
            }
            
            $this-> model -> create($data);

            return redirect()->route('users.index');
    }
    
    
    //FORM MODIFICAR USUARIO

    public function edit($id)
    {
        if(!$user= $this->model->find($id)){
            return redirect()->route('users.index');
        }
        
        return view('users.edit',compact('user'));
    }

    // MODIFICAR USUARIO DB
    public function update(StoreUpdateUserFormRequest  $request, $id)
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
    //ELIMINAR USUARIO
    public function destroy($id)
    {
        if(!$user= $this->model->find($id)){// si el request no encontrar usuario redirecciona al index
            return redirect()->route('users.index');
        }

        $user->delete();
        
        return redirect()->route('users.index');

    }

}
