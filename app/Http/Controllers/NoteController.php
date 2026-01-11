<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant', 'matiere'])->paginate(20);
        return view('notes.index', compact('notes'));
    }

    public function show($id)
    {
        $note = Note::with(['etudiant', 'matiere'])->findOrFail($id);
        return view('notes.show', compact('note'));
    }

    public function create()
    {
        $etudiants = Etudiant::orderBy('nom')->get();
        $matieres = Matiere::with('specialite')->get();
        return view('notes.create', compact('etudiants', 'matieres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nce' => 'required|exists:etudiants,nce',
            'codeMat' => 'required|exists:matieres,codeMat',
            'dateResultat' => 'required|date',
            'noteControle' => 'required|numeric|min:0|max:20',
            'noteExamen' => 'required|numeric|min:0|max:20',
        ]);
        
        // Calculate resultat automatically
        $validated['resultat'] = ($validated['noteControle'] * 0.4) + ($validated['noteExamen'] * 0.6);

        DB::beginTransaction();
        try {
            Note::create($validated);
            DB::commit();
            return redirect()->route('notes.index')->with('success', 'Note créée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création.');
        }
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $etudiants = Etudiant::orderBy('nom')->get();
        $matieres = Matiere::with('specialite')->get();
        return view('notes.edit', compact('note', 'etudiants', 'matieres'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'noteControle' => 'required|numeric|min:0|max:20',
            'noteExamen' => 'required|numeric|min:0|max:20',
        ]);
        
        $validated['resultat'] = ($validated['noteControle'] * 0.4) + ($validated['noteExamen'] * 0.6);

        DB::beginTransaction();
        try {
            $note = Note::findOrFail($id);
            $note->update($validated);
            DB::commit();
            return redirect()->route('notes.show', $id)->with('success', 'Note modifiée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $note = Note::findOrFail($id);
            $note->delete();
            DB::commit();
            return redirect()->route('notes.index')->with('success', 'Note supprimée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
