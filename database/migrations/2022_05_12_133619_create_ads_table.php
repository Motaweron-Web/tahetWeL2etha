<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->enum('type',['lost','found'])->default('lost')->nullable();
            $table->enum('place_type',['main','special'])->nullable();
            $table->text('address')->nullable();
            $table->double('latitude')->default(0)->nullable();
            $table->double('longitude')->default(0)->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->enum('country',['eg','sa','ae'])
                ->default('eg')->nullable();

            //////////////////////// foreign //////////////////////////
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')
                ->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('ads');
    }
}
