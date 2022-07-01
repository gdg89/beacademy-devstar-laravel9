<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class ViaCepController extends Controller
{
    public function index(Request $request)
    {
        if($request->cep)//Se existir una requisicão exivir siguiente tela.
            return redirect('/viacep/'.$request->cep);

        return view('viacep.index');
    }

    public function show($cep)
    {
        $response= Http::get('https://viacep.com.br/ws/'.$cep.'/json/')->json();
        
        return $response;
        

    }
}
