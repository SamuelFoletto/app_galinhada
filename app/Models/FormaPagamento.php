<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $table = 'forma_pagamento';
    protected $fillable = ['nome_forma_pagamento'];

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido', 'forma_pagamento_id', 'id');
    }


}
