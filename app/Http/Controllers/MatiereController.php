<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::with('specialite')->paginate(12);
        return view('matieres.index', compact('matieres'));
    }

    public function show($codeMat)
    {
        $matiere = Matiere::with('specialite', 'notes')->findOrFail($codeMat);
        return view('matieres.show', compact('matiere'));
    }

    public function create()
    {
        $specialites = Specialite::orderBy('designationSp')->get();
        return view('matieres.create', compact('specialites'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codeMat' => 'required|unique:matieres,codeMat',
            'designationMat' => 'required|string|max:255',
            'codeSp' => 'required|exists:specialites,codeSp',
            'niveau' => 'required|integer|min:1|max:5',
            'coef' => 'required|numeric|min:1|max:5',
            'credit' => 'required|integer|min:1|max:6',
        ]);
        
        DB::beginTransaction();
        try {
            Matiere::create($validated);
            DB::commit();
            return redirect()->route('matieres.index')->with('success', 'Matière créée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création de la matière.');
        }
    }

    public function edit($codeMat)
    {
        $matiere = Matiere::findOrFail($codeMat);
        $specialites = Specialite::orderBy('designationSp')->get();
        return view('matieres.edit', compact('matiere', 'specialites'));
    }

    public function update(Request $request, $codeMat)
    {
        $validated = $request->validate([
            'designationMat' => 'required|string|max:255',
            'codeSp' => 'required|exists:specialites,codeSp',
            'niveau' => 'required|integer|min:1|max:5',
            'coef' => 'required|numeric|min:1|max:5',
            'credit' => 'required|integer|min:1|max:6',
        ]);
        
        DB::beginTransaction();
        try {
            $matiere = Matiere::findOrFail($codeMat);
            $matiere->update($validated);
            DB::commit();
            return redirect()->route('matieres.show', $codeMat)->with('success', 'Matière modifiée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy($codeMat)
    {
        DB::beginTransaction();
        try {
            $matiere = Matiere::findOrFail($codeMat);
            $matiere->delete();
            DB::commit();
            return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
