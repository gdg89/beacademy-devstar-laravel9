<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')// realiza una referencia hacia la columna de otra tabla,ejemplo (columna id de la tabla users)
            ->constrained('users')//la columna en la tabla secundaria siempre hará referencia a la columna de identificación del padre.
            ->onDelete('CASCADE')//deleta registros dentro de la tabela, fazendo perder a referença.
            ->upDate('CASCADE');//modificaciones na tabela.
            $table->string('title');
            $table->text('post');
            $table->boolean('active')->default(true);//Post activos por default(Post es en este caso, pueden ser pedidos activos o alguna otra cosa por el estilo).
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
