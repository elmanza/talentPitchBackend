<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $acceptedData = ['Discover', 'Be discovered'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('main_goal', function (Blueprint $table) {
            $table->id();
            $table->enum('name', $this->acceptedData);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_goal');
    }
};
