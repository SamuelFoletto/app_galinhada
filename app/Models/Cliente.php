<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table = 'clientes';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'numero_casa',
        'complemento',
        'bairro',
        'regiao_id',
        'cep'
    ];

    public function rules(){
        return [
            'nome' => 'required|min:3|max:100',
            'email' => 'required|unique:clientes,email,'.$this->id.'|email',
            'telefone' => 'required|min:10|max:12',
            'endereco' => 'required|min:3|max:255',
            'numero_casa' => 'required|numeric',
            'bairro' => 'required',
            'cep' => 'required|min:8|max:9'
        ];
    }

    public function feedback(){
        return [
            'nome.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'nome.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'telefone.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'telefone.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'endereco.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'endereco.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'cep.min' => 'O ::attribute deve ter pelo menos :min caracteres',
            'cep.max' => 'O ::attribute deve ter pelo menos :max caracteres',
            'required' => 'O ::attribute é obrigatório',
        ];
    }


    public function pedidosCliente(){
        return $this->hasMany('App\Models\Pedido', 'cliente_id', 'id');
    }
    public function regiao()
    {
        return $this->belongsTo(Regiao::class, 'regiao_id', 'id');
    }

    public function getEnderecoCompletoAttribute()
    {
        return sprintf(
            '%s, %s - %s - %s',
            $this->endereco,
            $this->numero_casa,
            $this->complemento ?? '',
            $this->bairro
        );
    }
}
