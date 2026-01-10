<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = note::all();
        return view('notes.index', ["notes" => $notes]);
    }

    public function show($id)
    {
        $notes = note::findOrFail($id);
        return view('notes.show', ["note" => $notes]);  // Corrected data passed to view
    }

    public function create()
    {
        $notes=note::all();
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'nce' => 'required|exists:etudiants,nce',
            'codeMat' => 'required|exists:matieres,codeMat',
            'dateResultat' => 'required|date',
            'noteControle' => 'required|numeric',
            'noteExamen' => 'required|numeric',
            'resultat' => 'required|numeric',
        ]);
        note::create($info);
        return redirect()->route('notes.create'); 
    }

    public function destroy($id)
    {
        $notes = note::findOrFail($id);
        $notes->delete();
        return redirect()->route('notes.index');
    }
}
