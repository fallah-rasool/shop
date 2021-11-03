<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patent_id')->nullable();
            $table->foreign('patent_id')
                  ->on('categories')
                  ->references('id')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
            $table->string('title_fa')->unique();
            $table->string('title_en')->nullable()->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
