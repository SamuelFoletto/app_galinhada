<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regiao extends Model
{
    protected $table = 'regiao';
    protected $fillable = ['nome_regiao'];


    public function clientes(){
        return $this->hasMany('App\Models\Cliente', 'regiao_id', 'id');
    }

}

