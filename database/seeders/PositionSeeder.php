<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Position::create(['shortName' => 'Cel', 'name' => 'Coronel', 'priority' => 15]);
        Position::create(['shortName' => 'TCel', 'name' => 'Tenente Coronel', 'priority' => 14]);
        Position::create(['shortName' => 'Maj', 'name' => 'Major', 'priority' => 13]);
        Position::create(['shortName' => 'Cap', 'name' => 'Capitão', 'priority' => 12]);
        Position::create(['shortName' => '1º Ten', 'name' => '1º Tenente', 'priority' => 11]);
        Position::create(['shortName' => '2º Ten', 'name' => '2º Tenente', 'priority' => 10]);
        Position::create(['shortName' => 'Asp', 'name' => 'Aspirante', 'priority' => 9]);
        Position::create(['shortName' => 'S Ten', 'name' => 'Subtenente', 'priority' => 8]);
        Position::create(['shortName' => '1º Sgt', 'name' => '1º Sargento', 'priority' => 7]);
        Position::create(['shortName' => '2º Sgt', 'name' => '2º Sargento', 'priority' => 6]);
        Position::create(['shortName' => '3º Sgt', 'name' => '3º Sargento', 'priority' => 5]);
        Position::create(['shortName' => 'Cb EP', 'name' => 'Cabo Efetivo Profissional', 'priority' => 4]);
        Position::create(['shortName' => 'Sd EP', 'name' => 'Soldado Efetivo Profissional', 'priority' => 3]);
        Position::create(['shortName' => 'Cb EV', 'name' => 'Cabo Efetivo Variável', 'priority' => 2]);
        Position::create(['shortName' => 'Sd EV', 'name' => 'Soldado Efetivo Variável', 'priority' => 1]);
    }
}
