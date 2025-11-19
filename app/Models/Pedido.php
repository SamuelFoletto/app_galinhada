<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Pedido extends Model
{
    use SoftDeletes;
    protected $table = 'pedidos';
    protected $fillable = [
        'cliente_id',
        'produto_id',
        'quantidade',
        'valor_total',
        'data_pedido',
        'forma_pagamento_id',
        'status_id'
    ];


    public function rules(){
        return [
            'cliente_id' => 'required',
            'produto_id' => 'required',
            'quantidade' => 'required',
            'valor_total' => 'required',
            'forma_pagamento_id' => 'required',
        ];
    }

    public function feedback(){
        return[
            'required' => 'O campo ::attribute é obrigatório'

        ];
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto', 'produto_id', 'id');
    }

    public function statusPedido()
    {
        return $this->belongsTo(StatusPedido::class, 'status_id', 'id');
    }



    public function forma_pagamento(){
        return $this->belongsTo('App\Models\FormaPagamento', 'forma_pagamento_id', 'id');
    }





}
