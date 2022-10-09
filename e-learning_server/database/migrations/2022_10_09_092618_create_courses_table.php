<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->integer("user_id");
            $table->string("name");
            $table->text("description");
            $table->smallInteger("credits");
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('courses');
    }
};
