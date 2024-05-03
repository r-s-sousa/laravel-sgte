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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->foreignId('acted_id')->constrained('militaries');
            $table->string('actuator_identifier', 255);
            $table->longText('description');
            $table->integer('count_punishments')->default(0);
            $table->integer('count_comments')->default(0);
            $table->enum('type', [
                'Neutra',
                'Negativa',
                'Positiva'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
