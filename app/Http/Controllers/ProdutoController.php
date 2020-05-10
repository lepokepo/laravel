<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Requests\ProdutoRequest;
use App\Charts\ProdTopChart;


class ProdutoController extends Controller
{
    public function lista()
    {
        return view('produtos.lista', ['produtos' => Produto::paginate(20)]);
    }

    public function prodGraph()
    {
        $prods = Produto::orderBy('valor', 'desc')->take(5)->get();

        $chart = new ProdTopChart;
        //nomes prods
        $chart->labels([$prods[0]->nome, $prods[1]->nome, $prods[2]->nome, $prods[3]->nome, $prods[4]->nome]);
        $chart->dataset('Valores', 'line', [$prods[0]->valor, $prods[1]->valor, $prods[2]->valor, $prods[3]->valor, $prods[4]->valor]);

        return view('dashboard', compact('chart'));
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
    public function update(ProdutoRequest $request, Produto  $produto)
    {
        $produto->update($request->all());

        return redirect()->route('produto.lista')->withStatus(__('Produto atualizado com sucesso.'));
    }

    //  * Remove the specified user from storage
    public function destroy(Produto  $produto)
    {
        $produto->delete();

        return redirect()->route('produto.lista')->withStatus(__('Produto removido com sucesso.'));
    }
}
