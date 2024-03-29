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
        Schema::create('tb_products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('nm_product');
            $table->text('ds_product');
            $table->integer('qtd_product');
            $table->unsignedBigInteger('fk_user_create');
            $table->string('path_img')->default("/img/products/default.jpg");
            $table->unsignedBigInteger('fk_category');
            $table->timestamps();

            $table->foreign('fk_user_create')->references('id_user')->on('users');

            $table->foreign('fk_category')->references('id_category')->on('tb_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_products');
    }
};
