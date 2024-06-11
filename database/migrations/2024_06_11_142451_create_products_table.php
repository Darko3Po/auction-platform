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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('buy_price');
            $table->float('min_price');
            $table->dateTime('finish_date_auction');
            $table->unsignedBigInteger('image_id');
            $table->string('is_active')->default('active');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on(\App\Models\User::TABLE);

            $table->foreign('image_id')
                ->references('id')
                ->on(\App\Models\Image::TABLE);

        });
    }

//'name',
//'description',
//'buy_price',
//'min_price',
//'finish_date_auction',
//'image_id',
//'is_active',
//'user_id',

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
