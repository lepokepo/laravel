<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Hash;

class ProdutoController extends Controller
{
    public function lista()
    {
        return view('produtos.lista', ['produtos' => Produto::paginate(20)]);
    }

    public function novo()
    {
        return view('produtos.novo');
    }

    public function edita(Produto $prod)
    {
        return view('produtos.edita', compact('prod'));
    }



    //armazena o coiso do banco
    public function store(ProdutoRequest $request, Produto $model)
    {
        $model->create($request->all());

        return redirect()->route('produto.lista')->withStatus(__('Produto criado com sucesso.'));
    }


    //  * Update the specified user in storage
    public function update(Produto  $produto)
    {
        $produto->update();

        return redirect()->route('user.index')->withStatus(__('Produto atualizado com sucesso.'));
    }

    //  * Remove the specified user from storage
    public function destroy(Produto  $produto)
    {
        $produto->delete();

        return redirect()->route('produto.lista')->withStatus(__('Produto removido com sucesso.'));
    }
}
