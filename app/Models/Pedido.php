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
        'forma_pagamento',
        'status'

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pedido) {
            // Copia o valor do created_at para data_pedido
            $pedido->data_pedido = now();
        });
    }


    public function rules(){
        return [
            'cliente_id' => 'required',
            'produto_id' => 'required',
            'quantidade' => 'required',
            'forma_pagamento' => 'required',
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

    public function status(){
        return $this->hasOne('App\Models\StatusPedido', 'status', 'id');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaPagamento', 'forma_pagamento', 'id');
    }





}
