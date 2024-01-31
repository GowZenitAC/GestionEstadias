<?php

use App\Models\preguntasTSU;
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
        Schema::create('opcionestsu', function (Blueprint $table) {
            $table->id();
            $table->string('optiontsu');
            $table->integer('puntostsu');
            $table->foreignId('pregunta_tsu_id')->constrained('preguntastsu')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opcionestsu');
    }
};
