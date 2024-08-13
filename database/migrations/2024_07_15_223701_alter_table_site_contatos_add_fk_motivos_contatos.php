<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contato', function (Blueprint $table) {
            $table->unsignedBigInteger("motivos_contatos_id");
        });

        DB::statement("
            UPDATE
                site_contato
            SET
                motivos_contatos_id = motivo_contato");
        
        Schema::table('site_contato', function (Blueprint $table) {
            $table->foreign("motivos_contatos_id")->references('id')->on("motivo_contatos");
            $table->dropColumn("motivo_contato");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contato', function (Blueprint $table) {
            $table->integer("motivo_contato");
            $table->dropForeign("site_contato_motivo_contatos_id_foreign");
        });

        DB::statement("
            UPDATE
                site_contato
            SET
                motivo_contatos = motivo_contato_id"
        );
        Schema::table('site_contato', function (Blueprint $table) {
            $table->dropColumn("motivos_contatos_id");
        });
    }
};
