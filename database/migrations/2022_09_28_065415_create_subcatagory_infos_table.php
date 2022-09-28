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
        Schema::create('subcatagory_infos', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('subcatagory_name')->nullable();
            $table->string('subcatstatus')->nullable();
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
        Schema::dropIfExists('subcatagory_infos');
    }
};
