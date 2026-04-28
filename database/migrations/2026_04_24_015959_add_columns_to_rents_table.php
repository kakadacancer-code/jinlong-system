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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', ['vacant', 'occupied', 'maintenance'])->default('vacant');
            $table->string('type')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('size', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropColumn(['address','price','status','type','bedrooms','bathrooms','size','description','image']);
        });
    }
};
