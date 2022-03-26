<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->comment('Имя животного');
            $table->string('kind', 30)->unique()->comment('Тип животного');
            $table->integer('max_size')->comment('Иакс размер животного');
            $table->integer('max_age')->comment('Макс возраст животного');
            $table->float('growth_factor', 2, 1)->comment('Коэффициент роста');
            $table->string('image_src')->comment('Изображение животного');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
