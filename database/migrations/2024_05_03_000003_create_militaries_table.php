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
        Schema::create('militaries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('start_date');
            $table->date('birth_date');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('section_id')->constrained('sections');
            $table->integer('war_number');
            $table->string('war_name', 60);
            $table->string('name', 255);
            $table->string('mother_name', 255);
            $table->string('father_name', 255);
            $table->string('military_identity', 30);
            $table->string('cpf', 14);
            $table->string('email', 255)->nullable();
            $table->string('function', 255);
            $table->string('phone_number', 16);
            $table->string('manager_number', 16);
            $table->string('religion', 100);
            $table->string('marital_status', 20);
            $table->string('blood_type', 4);
            $table->string('image_path', 255);
            $table->boolean('consumes_alcohol');
            $table->boolean('smokes_cigarette');
            $table->enum(
                'drive_license_type',
                [
                    'A', 'AB', 'B', 'AC', 'C', 'AD', 'D', 'AE', 'E'
                ]
            );
            $table->enum(
                'behavior',
                [
                    'Excepcional',
                    'Ótimo',
                    'Bom',
                    'Insuficiente',
                    'Mau'
                ]
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('militaries');
    }
};
