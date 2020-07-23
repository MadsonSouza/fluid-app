<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id()->unique();;
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cep');
            $table->string('street');
            $table->string('city');
            $table->string('uf');
            $table->string('neigh');
            $table->string('number');
            $table->string('phone');
            $table->date('birth_date');
            $table->string('password');
            $table->string('gender', 2);
            $table->string('cpf', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}