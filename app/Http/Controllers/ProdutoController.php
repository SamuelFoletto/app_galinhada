<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class   ProdutoController extends Controller
{

    public function __construct(Produto $produto){
        $this->produto = $produto;
    }

    public function index()
    {
        $produtos = Produto::all();
        return view('app.produto.index', ['produtos' => $produtos]);
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('app.produto.create', ['produtos' => $produtos]);
    }


    public function store(Request $request)
    {
        $request->validate($this->produto->rules(), $this->produto->feedback());
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    public function show(string $id)
    {
        $produto = $this->produto->find($id);
        return view('app.produto.show', ['produto' => $produto]);
    }


    public function edit(string $id)
    {
        $produto = $this->produto->find($id);
        return view('app.produto.edit', ['produto' => $produto]);
    }


    public function update(Request $request, string $id)
    {
        $produto = $this->produto->find($id);

        $request->validate($this->produto->rules(), $this->produto->feedback());

        $produto->update($request->all());

        return redirect()->route('produto.index');
    }


    public function destroy(string $id)
    {
        $produto = $this->produto->find($id)->delete();
        return redirect()->route('produto.index');
    }
}
