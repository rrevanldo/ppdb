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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('jk');
            $table->string('nama');
            $table->string('asal_sekolah');
            $table->text('asal_sekolah_text')->nullable();
            $table->string('email');
            $table->string('no_hp');
            $table->string('no_hp_ayah');
            $table->string('no_hp_ibu');
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
        Schema::dropIfExists('ppdbs');
    }
};
