<!DOCTYPE html>
<html>

<head>
    <title>Заметки</title>
    <style>
        body {
            font-family: Arial;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .btn-primary {
            background: #007bff;
        }

        .btn-success {
            background: #28a745;
        }

        .btn-danger {
            background: #dc3545;
        }

        .note {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .alert {
            padding: 10px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Мои заметки</h1>

    @if(session('success'))
    <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('notes.create') }}" class="btn btn-primary">Создать заметку</a>

    @foreach($notes as $note)
    <div class="note">
        <h3>{{ $note->title }}</h3>
        <p>{{ $note->description }}</p>
        {{--
                Carbon::parse() - преобразует строку даты в объект Carbon (библиотека для работы с датами)
                ->format('d.m.Y') - форматирует дату:
                d - день (01-31)
                m - месяц (01-12)
                Y - год (4 цифры)
            --}}
        <small>Дата: {{ \Carbon\Carbon::parse($note->date)->format('d.m.Y') }}</small>
        <div style="margin-top: 10px;">
            <a href="{{ route('notes.edit', $note) }}" class="btn btn-success">Редактировать</a>

            <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Удалить?')">Удалить</button>
            </form>
        </div>
    </div>
    @endforeach
</body>

</html>