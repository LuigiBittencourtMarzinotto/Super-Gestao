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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string("unidades", 5);
            $table->string("descricao", 50);
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger("unidade_id");
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign("produtos_unidade_id_foreign"); // [table]_[coluna]_foreign
            $table->dropColumn("unidade_id");

        });


        Schema::dropIfExists('unidades');

    }
};
