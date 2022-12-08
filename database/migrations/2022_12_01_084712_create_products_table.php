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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('size', 50)->nullable();
            $table->string('color', 50);
            $table->integer('bust')->nullable();
            $table->integer('length')->nullable();
            $table->integer('waist')->nullable();
            $table->bigInteger('price');
            $table->text('image');
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->unsignedBigInteger('subcat_id');
            $table->unsignedBigInteger('testimonial_id')->nullable();

            // $table->foreign('subcat_id')->references('id')->on('subcategories');
            // $table->foreign('testimonial_id')->references('id')->on('testimonials');

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
        Schema::dropIfExists('products');
    }
};
