<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {

        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string("course_id");            
            $table->integer("user_id");
            $table->string("title");
            $table->text("assignment");
            $table->timestamps("due_to");
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('assignments');
    }
};
