<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;

class PedidoController extends Controller
{

    public function buscarCliente($id){
        $cliente = Cliente::with('regiao')->find($id);

        if ($cliente) {
            return response()->json([
                'id' => $cliente->id,
                'nome' => $cliente->nome,
                'email' => $cliente->email,
                'endereco' => $cliente->endereco,
                'numero_casa' => $cliente->numero_casa,
                'complemento' => $cliente->complemento,
                'bairro' => $cliente->bairro,
                'cep' => $cliente->cep,
                'nome_regiao' => $cliente->regiao->nome_regiao // Pega o nome da região
            ]);
        }

        return response()->json(['error' => 'Cliente não encontrado'], 404);
    }

    public function buscarClientePorNome(Request $request){
        $nome = $request->query('nome');

        $clientes = Cliente::with('regiao')
            ->where('nome', 'like', "%{$nome}%")
            ->get()
            ->map(function ($cliente) {
                return[
                'id' => $cliente->id,
                'nome' => $cliente->nome,
                'email' => $cliente->email,
                'endereco' => $cliente->endereco,
                'numero_casa' => $cliente->numero_casa,
                'complemento' => $cliente->complemento,
                'bairro' => $cliente->bairro,
                'nome_regiao' => $cliente->regiao->nome_regiao
            ];
            });

        return response()->json($clientes);

    }


    public function index()
    {
        return view('app.pedido.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
