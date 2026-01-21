<?php

use Illuminate\Support\Facades\Route;  // Класс для создания маршрутов
use App\Http\Controllers\NoteController;  // Подключаем наш контроллер

Route::get('/', function () {
    return redirect('/notes');
});

Route::resource('notes', NoteController::class);
