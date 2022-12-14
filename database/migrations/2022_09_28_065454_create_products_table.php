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
            $table->string('p_branch_id')->nullable();
            $table->string('p_cat_id')->nullable();
            $table->string('subcat_id')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('stock_limit')->nullable();
            $table->string('new_stock')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('m_image')->nullable();
            $table->string('h_image')->nullable();
            $table->string('other_images')->nullable();
            $table->string('prostatus')->nullable();
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
