<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('date', 'desc')->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        Note::create($request->all());
        return redirect()->route('notes.index')->with('success', 'Заметка создана!');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index')->with('success', 'Заметка обновлена!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Заметка удалена!');
    }
}
