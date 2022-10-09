<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(){

        Schema::create('submits', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("assignment_id");
            $table->file("file");
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('submits');
    }
};
