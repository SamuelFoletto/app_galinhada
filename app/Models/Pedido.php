<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'forma_pagamento',
        'status'

    ];




    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function produtos()
    {
        return $this->belongsToMany('App\Models\Produto', 'produto_id', 'id');
    }
}
