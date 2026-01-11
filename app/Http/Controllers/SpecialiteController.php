<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialiteController extends Controller
{
    public function index()
    {
        $specialites = Specialite::withCount(['inscriptions', 'matieres'])->paginate(12);
        return view('specialites.index', compact('specialites'));
    }

    public function show($codeSp)
    {
        $specialite = Specialite::with(['inscriptions.etudiant', 'matieres'])->findOrFail($codeSp);
        return view('specialites.show', compact('specialite'));
    }

    public function create()
    {
        return view('specialites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codeSp' => 'required|unique:specialites,codeSp',
            'designationSp' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            Specialite::create($validated);
            DB::commit();
            return redirect()->route('specialites.index')->with('success', 'Spécialité créée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création.');
        }
    }

    public function edit($codeSp)
    {
        $specialite = Specialite::findOrFail($codeSp);
        return view('specialites.edit', compact('specialite'));
    }

    public function update(Request $request, $codeSp)
    {
        $validated = $request->validate([
            'designationSp' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            $specialite = Specialite::findOrFail($codeSp);
            $specialite->update($validated);
            DB::commit();
            return redirect()->route('specialites.show', $codeSp)->with('success', 'Spécialité modifiée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy($codeSp)
    {
        DB::beginTransaction();
        try {
            $specialite = Specialite::findOrFail($codeSp);
            $specialite->delete();
            DB::commit();
            return redirect()->route('specialites.index')->with('success', 'Spécialité supprimée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
