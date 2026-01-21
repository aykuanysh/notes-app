<?php
// Подключаем необходимые классы Laravel
use Illuminate\Database\Migrations\Migration;  // Базовый класс для миграций
use Illuminate\Database\Schema\Blueprint;      // Класс для создания структуры таблицы
use Illuminate\Support\Facades\Schema;         // Фасад для работы со схемой БД

// Возвращаем анонимный класс, который наследуется от Migration
return new class extends Migration
{
    public function up(): void
    {

        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {

        Schema::dropIfExists('notes');
    }
};
