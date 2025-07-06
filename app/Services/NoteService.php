<?php

namespace App\Services;

use App\Models\Note;

class NoteService
{
    public function list()
    {
        return Note::latest()->paginate(10);
    }

    public function store(array $data)
    {
        return Note::create($data);
    }

    public function update(Note $note, array $data)
    {
        $note->update($data);
        
        return $note;
    }

    public function delete(Note $note)
    {
        return $note->delete();
    }
}