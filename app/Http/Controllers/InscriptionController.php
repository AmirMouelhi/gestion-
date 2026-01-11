<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::with(['etudiant', 'specialite'])->paginate(15);
        return view('inscriptions.index', compact('inscriptions'));
    }

    public function create()
    {
        $etudiants = Etudiant::orderBy('nom')->get();
        $specialites = Specialite::orderBy('designationSp')->get();
        return view('inscriptions.create', compact('etudiants', 'specialites'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nce' => 'required|exists:etudiants,nce',
            'codeSp' => 'required|exists:specialites,codeSp',
            'dateInscription' => 'required|date',
            'niveauInscription' => 'required|integer|min:1|max:5',
            'resultatFinale' => 'required|numeric|min:0|max:20',
            'mention' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            Inscription::create($validated);
            DB::commit();
            return redirect()->route('inscriptions.index')->with('success', 'Inscription créée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création.');
        }
    }

    public function show($id)
    {
        $inscription = Inscription::with(['etudiant', 'specialite'])->findOrFail($id);
        return view('inscriptions.show', compact('inscription'));
    }

    public function edit($id)
    {
        $inscription = Inscription::findOrFail($id);
        $etudiants = Etudiant::orderBy('nom')->get();
        $specialites = Specialite::orderBy('designationSp')->get();
        return view('inscriptions.edit', compact('inscription', 'etudiants', 'specialites'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'niveauInscription' => 'required|integer|min:1|max:5',
            'resultatFinale' => 'required|numeric|min:0|max:20',
            'mention' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $inscription = Inscription::findOrFail($id);
            $inscription->update($validated);
            DB::commit();
            return redirect()->route('inscriptions.show', $id)->with('success', 'Inscription modifiée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $inscription = Inscription::findOrFail($id);
            $inscription->delete();
            DB::commit();
            return redirect()->route('inscriptions.index')->with('success', 'Inscription supprimée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
