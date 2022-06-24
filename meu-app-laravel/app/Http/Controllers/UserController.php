<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            'nomes'=>[
                'Giuliano García',
                    'Graziela Barreto'
                        ]
        ];
        dd($users);
    }

    public function show($id)
    {
        dd('Id de usuario '.$id);
    }

}
