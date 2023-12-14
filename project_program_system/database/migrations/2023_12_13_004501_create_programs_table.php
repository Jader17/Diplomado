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

        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->text('title');
            $table->text('description');
            $table->string('logo', 255);
            $table->string('email', 255);
            $table->string('phone', 50);
            $table->text('work_lines');
            $table->string('resolution', 255);
            $table->date('register_date');
            $table->string('modality', 60);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('programs');
    }
};
