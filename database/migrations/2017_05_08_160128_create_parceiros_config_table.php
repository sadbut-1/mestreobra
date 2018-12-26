<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceirosConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiros_config', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('mostrar')->default(1);
            $table->timestamps();
        });

        DB::table('parceiros_config')->insert([
            [
                'mostrar' => 1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parceiros_config');
    }
}
