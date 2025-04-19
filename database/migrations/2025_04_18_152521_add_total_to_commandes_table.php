<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.s
     *
     * @return void
     */
    public function up()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->decimal('total', 10, 2)->after('user_id'); // 10 digits total, 2 decimal places
    });
}

public function down()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->dropColumn('total');
    });
}
};
