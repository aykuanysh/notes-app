<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        Note::create([
            'title' => 'Первая заметка',
            'description' => 'Это тестовая заметка для проверки функционала',
            'date' => '2026-01-15'
        ]);

        Note::create([
            'title' => 'Встреча с командой',
            'description' => 'Обсудить планы на следующий квартал',
            'date' => '2026-01-22'
        ]);

        Note::create([
            'title' => 'Купить продукты',
            'description' => 'Молоко, хлеб, яйца, масло',
            'date' => '2026-01-21'
        ]);
    }
}
