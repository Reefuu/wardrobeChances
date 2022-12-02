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
            $table->string('size', 50);
            $table->string('color', 50);
            $table->integer('bust');
            $table->integer('length');
            $table->integer('waist');
            $table->bigInteger('price');
            $table->text('image');
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->unsignedBigInteger('subcat_id');
            $table->unsignedBigInteger('testimonial_id');
            $table->unsignedBigInteger('comments_id');

            $table->foreign('subcat_id')->references('id')->on('subcategories');
            $table->foreign('testimonial_id')->references('id')->on('testimonials');
            $table->foreign('comments_id')->references('id')->on('comments');

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
