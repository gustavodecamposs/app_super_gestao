<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id(); //Identificador único
            $table->string('filial', 30); //Criou uma coluna tipo string, com o nome de filial de até 30 caracteres.
            $table->timestamps(); //Colunas que armazenaram os timestamps, de criação e alteração dos nossos registros
    });
        //Criando a tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('filial_id'); 
            $table->unsignedBigInteger('produto_id'); 
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps(); 

            //foreign key(constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
    });

        //Removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('preco_venda', 'estoque_minimo', 'estoque_maximo');
        });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionar colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 8, 2);
            $table->intenger('estoque_minimo', 8, 2);
            $table->intenger('estoque_maximo', 8, 2);
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
