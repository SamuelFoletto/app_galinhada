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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('regiao')->get();

        return view('app.cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $regioes = Regiao::all();

        return view('app.cliente.create', ['clientes' => $clientes, 'regioes' => $regioes]);
          }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)    {

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = $this->cliente->find($id);
        return view('app.cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $regioes = Regiao::all();
        $cliente = $this->cliente->find($id);
        return view('app.cliente.edit', ['cliente' => $cliente, 'regioes' => $regioes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $cliente = $this->cliente->find($id);

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = $this->cliente->find($id)->delete();
        return redirect()->route('cliente.index');
    }
}
