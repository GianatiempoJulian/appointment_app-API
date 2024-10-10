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
        Schema::create('servicies', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->integer("duration");
            $table->float("price");
            $table->foreignId('typeServicie_id')->constrained('type_servicies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicies');
    }
};