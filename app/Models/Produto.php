<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    protected $table = 'produtos';
    protected $fillable = [
        'nome_produto',
        'valor_produto',
        'descricao',
        'peso',
    ];

    public function rules(){
        return [
            'nome_produto' => 'required',
            'valor_produto' => 'required|numeric',
            'descricao' => 'required|min:3|max:255',
            'peso' => 'required|numeric'
        ];
    }

    public function feedback()
    {
        return[
            'valor_produto.numeric' => 'O valor deve ser um número válido',
            'peso.numeric' => 'Informe apenas números',
            'required' => 'O :attribute é um campo obrigatório'
    ];
    }

    public function produto(){
        return $this->hasMany('App\Models\Pedido', 'pedido_id', 'id');
    }
}
