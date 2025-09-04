<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //Colunas 
            $table->id();
            $table->unsignedBigInteger('produto_id'); // Quando definimos umna chave estrangeira, utilizamos o singular do nome da tabela (produto)_Id = produto_id
            $table->float('comprimentos', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constraint (de relacionamento = nossa foreignkey)
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         
        Schema::dropIfExists('produto_detalhes');
    }
}
