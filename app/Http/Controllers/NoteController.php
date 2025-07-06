<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }
       
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = $this->noteService->list();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        $this->noteService->store($request->validated());

        return redirect()->route('notes.index')->with('success', 'Nota creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    /**
     * Display the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note)
    {
        $this->noteService->update($note, $request->validated());

        return redirect()->route('notes.index')->with('success', 'Nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->noteService->delete($note);

        return redirect()->route('notes.index')->with('success', 'Nota eliminada con éxito.');
    }
}
