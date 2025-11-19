<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    protected $table = 'status_pedidos';
    protected $fillable = ['status_pedido_atual'];

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'status_id', 'id');
    }
}
