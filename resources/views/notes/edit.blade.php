<!DOCTYPE html>
<html>

<head>
    <title>Редактировать заметку</title>
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
            background: #28a745;
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
    <h1>Редактировать заметку</h1>

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $note->title) }}" required>
        @error('title')<div class="error">{{ $message }}</div>@enderror

        <textarea name="description" rows="5" required>{{ old('description', $note->description) }}</textarea>
        @error('description')<div class="error">{{ $message }}</div>@enderror

        <input type="date" name="date" value="{{ old('date', $note->date) }}" required>
        @error('date')<div class="error">{{ $message }}</div>@enderror

        <button type="submit" class="btn">Обновить</button>
        <a href="{{ route('notes.index') }}">Отмена</a>
    </form>
</body>

</html>