<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    protected $table = 'status_pedido';
    protected $fillable = ['status_pedido_atual'];

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido', 'status', 'id');
    }
}
