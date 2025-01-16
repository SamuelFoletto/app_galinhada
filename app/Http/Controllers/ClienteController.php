<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('app.cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)    {
        $rules = [
            'nome' => 'required|min:3|max:100',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|min:10|max:12',
            'endereco' => 'required|min:3|max:255',
            'numero_casa' => 'required|numeric',
            'bairro' => 'required',
            'cep' => 'required|min:8|max:9',
        ];
        $feedback = [
            'nome.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'nome.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'telefone.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'telefone.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'endereco.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'endereco.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'cep.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'cep.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'required' => 'O ::attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
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
