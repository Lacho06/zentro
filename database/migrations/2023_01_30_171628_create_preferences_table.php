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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('open_sunday')->nullable();
            $table->string('open_saturday')->nullable();
            $table->string('open_monday')->nullable();
            $table->string('close_sunday')->nullable();
            $table->string('close_saturday')->nullable();
            $table->string('close_monday')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('instagram_link')->nullable();
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
        Schema::dropIfExists('preferences');
    }
};
