<?php

use App\Enums\TypeOfStatusEnum;
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
        Schema::create('foodfacts', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('code');
            $table->enum('status', [TypeOfStatusEnum::class]);
            $table->dateTime('imported_t');
            $table->string('url');
            $table->string('creator');
            $table->string('created_t');
            $table->string('last_modified_t');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('brands');
            $table->string('categories');
            $table->string('labels');
            $table->string('cities');
            $table->string('purchase_places');
            $table->string('stores');
            $table->longText('ingredients_text');
            $table->text('traces');
            $table->string('serving_size');
            $table->double('serving_quantity');
            $table->double('nutriscore_score');
            $table->string('nutriscore_grade');
            $table->string('main_category');
            $table->string('image_url');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodfacts');
    }
};
