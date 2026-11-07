<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Description");
            $table->string("img");
            $table->double("Cost");
            $table->unsignedBigInteger("owner_id");
            $table->unsignedBigInteger("category_id");
            $table->timestamps();

            $table->foreign("owner_id")->references("id")->on("users");
            $table->foreign("category_id")->references("id")->on("categories");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
