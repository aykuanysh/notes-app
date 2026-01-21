<!DOCTYPE html>
<html>

<head>
    <title>Создать заметку</title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        .btn {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <h1>Создать заметку</h1>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Название" value="{{ old('title') }}" required>
        @error('title')<div class="error">{{ $message }}</div>@enderror

        <textarea name="description" placeholder="Описание" rows="5" required>{{ old('description') }}</textarea>
        @error('description')<div class="error">{{ $message }}</div>@enderror

        <input type="date" name="date" value="{{ old('date') }}" required>
        @error('date')<div class="error">{{ $message }}</div>@enderror

        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ route('notes.index') }}">Отмена</a>
    </form>
</body>

</html>