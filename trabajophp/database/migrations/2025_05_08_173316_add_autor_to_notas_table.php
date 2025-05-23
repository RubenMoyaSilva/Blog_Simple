<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('notas', function (Blueprint $table) {
        $table->string('autor')->nullable();
    });
}

public function down()
{
    Schema::table('notas', function (Blueprint $table) {
        $table->dropColumn('autor');
    });
}

};
