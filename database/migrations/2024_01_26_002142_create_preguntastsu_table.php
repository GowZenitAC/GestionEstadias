<?php

use App\Models\Carreras;
use App\Models\CategoryTSU;
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
        Schema::create('preguntastsu', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->string('imagen_preguntatsu')->nullable();
            $table->foreignId('category_t_s_u_id')->constrained('categoriestsu')->onDelete('cascade');
            // $table->foreignIdFor(CategoryTSU::class);
            $table->foreignId('carreras_id')->constrained('Carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntastsu');
    }
};
