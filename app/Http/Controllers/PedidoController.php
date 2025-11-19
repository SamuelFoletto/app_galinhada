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
        $forma_pagamento = FormaPagamento::all();
        $statusAtual = StatusPedido::find(1);
        return view('app.pedido.create', ['clientes' => $clientes, 'produtos' => $produtos, 'forma_pagamento' => $forma_pagamento, 'statusAtual' => $statusAtual->status_pedido_atual]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->pedido->rules(),
            $this->pedido->feedback()
        );

        $validated['status_id'] = 1;
        $validated['data_pedido'] = now();

        Pedido::create($validated);

        return redirect()->route('pedido.index');
    }


    public function show(string $id)
    {
        $pedido = $this->pedido->find($id);
        $produtos = Produto::all();
        $clientes = Cliente::find($this->pedido->find($id)->cliente_id);
        $forma_pagamento = FormaPagamento::all();
        $statusAtual = StatusPedido::all();

        $enderecoCompleto = $clientes->endereco_completo;


        return view('app.pedido.show', ['pedido' => $pedido,'clientes' => $clientes, 'produtos' => $produtos, 'forma_pagamento' => $forma_pagamento, 'statusAtual' => $statusAtual, 'enderecoCompleto' => $enderecoCompleto]);

    }

    public function edit(string $id)
    {
        $pedido = $this->pedido->find($id);
        $produtos = Produto::all();
        $clientes = Cliente::find($this->pedido->find($id)->cliente_id);
        $forma_pagamento = FormaPagamento::all();
        $statusAtual = StatusPedido::all();
        $enderecoCompleto = $clientes->endereco_completo;

        return view('app.pedido.edit', ['pedido' => $pedido, 'clientes' => $clientes, 'produtos' => $produtos, 'forma_pagamento' => $forma_pagamento, 'statusAtual' => $statusAtual, 'enderecoCompleto' => $enderecoCompleto]);
    }

    public function update(Request $request, string $id)
    {
        $pedido = $this->pedido->find($id);
        $pedido->update($request->all());
        return redirect()->route('pedido.index');
    }


    public function buscarClientePorId($id)
    {
        $cliente = Cliente::with('regiao')->find($id);

        if (!$cliente) {
            return response()->json(['erro' => 'Cliente não encontrado'], 404);
        }

        return response()->json([
            'id' => $cliente->id,
            'nome' => $cliente->nome,
            'endereco' => $cliente->endereco,
            'numero_casa' => $cliente->numero_casa,
            'complemento' => $cliente->complemento,
            'bairro' => $cliente->bairro,
            'cep' => $cliente->cep,
            'nome_regiao' => $cliente->regiao->nome_regiao
        ]);
    }

    public function buscarClientePorNome(Request $request)
    {
        $nome = $request->nome;

        $clientes = Cliente::where('nome', 'LIKE', "%$nome%")
            ->with('regiao')
            ->get()
            ->map(function ($cliente) {
                return [
                    'id' => $cliente->id,
                    'nome' => $cliente->nome,
                    'endereco' => $cliente->endereco,
                    'numero_casa' => $cliente->numero_casa,
                    'complemento' => $cliente->complemento,
                    'bairro' => $cliente->bairro,
                    'cep' => $cliente->cep,
                    'nome_regiao' => $cliente->regiao->nome_regiao
                ];
            });

        return response()->json($clientes);
    }

    public function updateStatus(Request $request, Pedido $pedido)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $pedido->status = $request->status;
        $pedido->save();

        return redirect()->back()->with('success', 'Status atualizado!');
    }



}
