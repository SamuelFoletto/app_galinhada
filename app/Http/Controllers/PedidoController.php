<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\FormaPagamento;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\StatusPedido;

class PedidoController extends Controller
{
    public function __construct(Pedido $pedido){
        $this->pedido = $pedido;
    }

    public function index()
    {
        $pedidos = Pedido::with('cliente', 'produto')->get();
        return view('app.pedido.index', ['pedidos' => $pedidos]);
    }

    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        $formasPagamento = FormaPagamento::all();
        $statusAtual = StatusPedido::find(1);
        return view('app.pedido.create', ['clientes' => $clientes, 'produtos' => $produtos, 'formasPagamento' => $formasPagamento, 'statusAtual' => $statusAtual->status_pedido_atual]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        Pedido::create($request->all());
        return redirect()->route('pedido.index');
    }

    public function show(string $id)
    {
        $pedidos = $this->pedido->find($id);
        $produtos = Produto::all();
        $clientes = Cliente::find($this->pedido->find($id)->cliente_id);
        $forma_pagamento = FormaPagamento::all();
        $statusAtual = StatusPedido::find(1);

        $enderecoCompleto = $clientes->endereco_completo;


        return view('app.pedido.show', ['pedidos' => $pedidos,'clientes' => $clientes, 'produtos' => $produtos, 'forma_pagamento' => $forma_pagamento, 'statusAtual' => $statusAtual->status_pedido_atual, 'enderecoCompleto' => $enderecoCompleto]);

    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
