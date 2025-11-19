<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    public function __construct(FormaPagamento $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }
    public function index()
    {
        $formas_pagamento = FormaPagamento::all();
        return view('app.forma_pagamento.index', ['formas_pagamento' => $formas_pagamento]);
    }


    public function create()
    {
        $formas_pagamento = FormaPagamento::all();
        return view('app.forma_pagamento.create', ['formas_pagamento' => $formas_pagamento]);
    }


    public function store(Request $request)
    {
        FormaPagamento::create($request->all());
        return redirect()->route('forma_pagamento.index');
    }

}
