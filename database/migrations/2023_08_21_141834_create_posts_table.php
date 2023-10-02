<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('likes')->default(0);
            $table->boolean('isEnable')->default(1);
            $table->timestamps();
            //Мягкая очистка. Позволяет не удалить значение полностью из таблицы, а добавить в корзину
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
