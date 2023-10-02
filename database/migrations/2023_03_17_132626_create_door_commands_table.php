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
        Schema::create('door_commands', function (Blueprint $table) {
            $table->id();
            $table->string('command');
            $table->string('old_command');
            $table->string('password');
            $table->string('viewer_join_time')->nullable();
            $table->string('admin_join_time')->nullable();
            $table->integer('num_trial')->default(0);
            $table->enum('viewer',['active','inactive'])->default('inactive'); 
            $table->enum('admin',['active','inactive'])->default('inactive'); 
           
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
        Schema::dropIfExists('door_commands');
    }
};
