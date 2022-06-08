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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('nis');
            $table->string('nama_ortu');
            $table->string('alamat_ortu');
            $table->string('telepon_ortu');
            $table->string('pekerjaan_ortu');
            $table->string('foto');
            $table->string('status');
            // $table->unsignedBigInteger('user_id');

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
