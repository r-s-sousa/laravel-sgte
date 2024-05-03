<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transgressions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('actuator_id')->constrained('militaries');
            $table->foreignId('acted_id')->constrained('militaries');
            $table->longText('description');
            $table->date('date');
            $table->integer('days')->nullable();
            $table->longText('punishiment_description')->nullable();
            $table->enum(
                'punishiment_type',
                [
                    'Arquivada',
                    'Advertência',
                    'Impedimento disciplinar',
                    'Repreensão',
                    'Detenção disciplinar',
                    'Prisão disciplinar',
                    'Licenciamento e a exclusão a bem da disciplina',
                ]
            )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transgressions');
    }
};
