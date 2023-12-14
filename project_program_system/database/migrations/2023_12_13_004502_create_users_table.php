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
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identification', 15);
            $table->string('name', 255);
            $table->string('gender', 50);
            $table->string('address', 255);
            $table->string('phone', 50);
            $table->string('email', 255);
            $table->date('birth_date');
            $table->text('photo');
            $table->date('link_date');
            $table->string('agreement', 255);
            $table->string('password', 45);
            $table->string('role', 50);
            $table->string('job', 100);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
