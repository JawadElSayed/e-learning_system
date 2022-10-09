<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integerIncrements('user_id')->from(10000);
            $table->string('name');
            $table->string('password');
            $table->string('user_type');
            $table->timestamps();
        });
    }

    public function down() {
        
        Schema::dropIfExists('users');
    }
};
