<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Regiao;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function index()
    {
        $clientes = Cliente::with('regiao')->get();

        return view('app.cliente.index', ['clientes' => $clientes]);
    }


    public function create()
    {
        $clientes = Cliente::all();
        $regioes = Regiao::all();

        return view('app.cliente.create', ['clientes' => $clientes, 'regioes' => $regioes]);
          }


    public function store(Request $request)    {

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $cliente = $this->cliente->create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'numero_casa' => $request->numero_casa,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'regiao_id' => $request->regiao_id,
            'cep' => $request->cep,
        ]);

        return response()->json($cliente, 201);


    }


    public function show(string $id)
    {
        $cliente = $this->cliente->find($id);

        if (!$cliente) {
            return response()->json(['Erro:' => 'Cliente não existe']);
        }
        return ($cliente);
    }


    public function edit(string $id)
    {
        $regioes = Regiao::all();
        $cliente = $this->cliente->find($id);
        return view('app.cliente.edit', ['cliente' => $cliente, 'regioes' => $regioes]);
    }


    public function update(Request $request, $id)
    {

        $cliente = $this->cliente->find($id);

        if (!$cliente){
            return response()->json(['Erro:' => 'Cliente não existe']);
        }

        if($request->method() === 'PATCH'){
            $regrasDinamicas = array();
            foreach ($cliente->rules() as $input => $regra){

                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $cliente->feedback());
        } else {

            $request->validate($cliente->rules(), $cliente->feedback());

        }

        $cliente->fill($request->all());
        $cliente->save();

        return response()->json($cliente, 204);
    }


    public function destroy(string $id)
    {
        $cliente = $this->cliente->find($id)->delete();
        if (!$cliente) {
            return response()->json(['Erro:' => 'Cliente não existe']);
        }
        $cliente->delete;
    }
}
