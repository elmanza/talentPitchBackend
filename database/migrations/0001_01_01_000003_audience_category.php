<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $acceptedData = ['Athletes', 'Artists', 'Creatives'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audience_categories', function (Blueprint $table) {
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
        Schema::dropIfExists('audience_categories');
    }
};
