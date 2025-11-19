<?php

namespace Database\Seeders;

use App\Models\Regiao;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Samuel',
            'email' => 'sfoletto@gmail.com',
            'password' => bcrypt('teste'),
        ]);

        DB::table('regiao')->insert([
            [
            'nome_regiao' => 'Norte',
            ],
        [
            'nome_regiao' => 'Sul',

        ],
        [
            'nome_regiao' => 'Oeste',

        ],
        [
            'nome_regiao' => 'Leste',

        ]
        ]);

        DB::table('status_pedidos')->insert([
            [
                'status_pedido_atual' => 'Novo'
            ],
            [
                'status_pedido_atual' => 'Em andamento'
            ],            [
                'status_pedido_atual' => 'Finalizado'
            ],            [
                'status_pedido_atual' => 'Cancelado'
            ],
        ]);

        DB::table('forma_pagamento')->insert([
            ['nome_forma_pagamento' => 'PIX'],
            ['nome_forma_pagamento' => 'Dinheiro'],
            ['nome_forma_pagamento' => 'Cartão de Crédito'],
            ['nome_forma_pagamento' => 'Cartão de Débito'],
            ['nome_forma_pagamento' => 'Permuta'],
        ]);

        DB::table('produtos')->insert([
            [
                'nome_produto' => 'Galinhada Tradicional',
                'valor_produto' => '24.90',
                'descricao' => 'Galinhada feita na hora com: arroz, coxa e sobrecoxa de frango em cubos, molho vermelho, cebola picada, cenoura, milho, cheiro verde, banha e manteiga',
                'peso' => 300
            ],
            [
                'nome_produto' => 'Galinhada Tradicional',
                'valor_produto' => '39.90',
                'descricao' => 'Galinhada feita na hora com: arroz, coxa e sobrecoxa de frango em cubos, molho vermelho, cebola picada, cenoura, milho, cheiro verde, banha e manteiga',
                'peso' => 600
            ],

        ]);

        DB::table('clientes')->insert([
            [
                'nome' => 'Anderson Silva',
                'email' => 'anderson@silva.com.br',
                'telefone' => '45999090909',
                'endereco' => 'Av Brasil',
                'numero_casa' => '5952',
                'complemento' => '',
                'bairro' => 'Centro',
                'regiao_id' => 1,
                'cep' => '85812001'
            ],
            [
                'nome' => 'Muhammad Ali',
                'email' => 'muhammad@ali.com.br',
                'telefone' => '45999090909',
                'endereco' => 'Av das Torres',
                'numero_casa' => '5952',
                'complemento' => '',
                'bairro' => 'FAG',
                'regiao_id' => 3,
                'cep' => '85812001'
            ],

        ]);

        DB::table('pedidos')->insert([
            [
                'cliente_id' => 1,
                'produto_id' => 1,
                'quantidade' => 2,
                'valor_total' => '49.80',
                'data_pedido' => Carbon::now()->toDateTimeString(),
                'forma_pagamento_id' => 1,
                'status_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),


            ],
            [
                'cliente_id' => 1,
                'produto_id' => 2,
                'quantidade' => 3,
                'valor_total' => '119.70',
                'data_pedido' => Carbon::now()->toDateTimeString(),
                'forma_pagamento_id' => 3,
                'status_id' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),


            ],
            [
                'cliente_id' => 2,
                'produto_id' => 1,
                'quantidade' => 1,
                'valor_total' => '24.90',
                'data_pedido' => Carbon::now()->toDateTimeString(),
                'forma_pagamento_id' => 2,
                'status_id' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'cliente_id' => 2,
                'produto_id' => 2,
                'quantidade' => 1,
                'valor_total' => '39.90',
                'data_pedido' => Carbon::now()->toDateTimeString(),
                'forma_pagamento_id' => 5,
                'status_id' => 4,
                'created_at' => Carbon::now()->toDateTimeString(),

            ],
        ]);
    }
}
