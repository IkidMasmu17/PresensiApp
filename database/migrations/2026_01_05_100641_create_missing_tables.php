<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade');
        });

        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('amount');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('present_at');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('concession', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('reason');
            $table->text('description');
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
        Schema::dropIfExists('concession');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('salary');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
        Schema::dropIfExists('roles');
    }
}
