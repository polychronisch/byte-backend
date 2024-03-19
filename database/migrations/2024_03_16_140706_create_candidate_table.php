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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('lastName')->nullable(false);
            $table->string('firstName')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('mobile');
            $table->foreignId('degree_id')->references('id')->on('degrees');
            $table->string('resume')->nullable();
            $table->date('applicationDate')->default(DB::raw('CURRENT_DATE'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
