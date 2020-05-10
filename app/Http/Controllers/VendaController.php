<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\VendaRequest;
use App\Venda;


class VendaController extends Controller
{
    public function nova(UserRequest $request,Venda $venda)
    {
        $venda->where('user_id', $request->id)->where();

        return view('vendas.lista');
    }


    public function store(VendaRequest $request, Venda $venda)
    {
        if ($request->finalizada == 1) {
            $venda->store($request);
        }else{

        }
        
    }
}
