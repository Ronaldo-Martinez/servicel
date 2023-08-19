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
        Schema::table('pais', function (Blueprint $table) {
            $table->string('codigo_pais')->after('nombre');
            $table->string('numero_telefono')->after('codigo_pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pais', function (Blueprint $table) {
            $table->dropColumn('codigo_pais');
            $table->dropColumn('numero_telefono');
        });
    }
};
