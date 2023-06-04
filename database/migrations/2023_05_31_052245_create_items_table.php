<?php

use App\Models\Items;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categori_id');
            $table->string('link');
            $table->string('slug');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('after_discount')->nullable();
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
        Schema::dropIfExists('items');
    }
};
