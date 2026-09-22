<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('operador')->after('email')->index();
            $table->boolean('status')->default(true)->after('role')->index();
            $table->boolean('must_change_password')->default(false)->after('password');
        });

        // Asegurar que usuarios existentes tengan rol admin y estén activos
        DB::table('users')->update([
            'role' => 'admin',
            'status' => true,
            'must_change_password' => false,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'must_change_password']);
        });
    }
};
