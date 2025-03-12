<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('app.cliente.index', ['clientes' => $clientes]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('app.cliente.create', ['clientes' => $clientes]);
    }


    public function store(Request $request)    {

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }


    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente = $this->cliente->find($id);
        return view('app.cliente.show', ['cliente' => $cliente]);
    }


    public function edit(string $id)
    {
        $cliente = $this->cliente->find($id);
        return view('app.cliente.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {

        $cliente = $this->cliente->find($id);

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    public function destroy(string $id)
    {
        //
        $cliente = $this->cliente->find($id)->delete();
        return redirect()->route('cliente.index');
    }
}
