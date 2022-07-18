<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user()
    {   
        //VALIDANDO LOGIN DE USUARIO.

        $user=User::factory()->create();//creando um usuario.

        $response = $this->post('/login',[//pasando parametros do usuario criado e o teste faz o login.
            'email'=>$user->email,
            'password'=>'password'

        ]);

        $this->actingAs($user);

        $response = $this->get('/users');//se consegue accesar a rota retorna status 200.

        $response->assertStatus(200);
    }

    //CRIANDO USUARIO.
    public function test_create_user(){
        $response= $this->post('/login/create',[
            'name'=> 'Admin',
            'email'=> 'admin@email.com',
            'password'=>'12345678',
            'is_admin'=> 1,
        ]);
        
        $response->assertStatus(200);
    }
}
