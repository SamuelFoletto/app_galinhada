<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->decimal('valor_total', 8, 2);
            $table->date('data_pedido');
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->unsignedBigInteger('status_id');
            $table->softDeletes();
            $table->timestamps();



            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamento');
            $table->foreign('status_id')->references('id')->on('status_pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
