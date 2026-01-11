<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::withCount(['etudiantsNesIci', 'etudiantsHabitantIci'])->orderBy('designationVilles')->paginate(15);
        return view('villes.index', compact('villes'));
    }

    public function show($cpVilles)
    {
        $ville = Ville::with(['etudiantsNesIci', 'etudiantsHabitantIci'])->findOrFail($cpVilles);
        return view('villes.show', compact('ville'));
    }

    public function create()
    {
        return view('villes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cpVilles' => 'required|unique:villes,cpVilles|integer',
            'designationVilles' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            Ville::create($validated);
            DB::commit();
            return redirect()->route('villes.index')->with('success', 'Ville créée avec succès!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création.');
        }
    }

    public function edit($cpVilles)
    {
        $ville = Ville::findOrFail($cpVilles);
        return view('villes.edit', compact('ville'));
    }

    public function update(Request $request, $cpVilles)
    {
        $validated = $request->validate([
            'designationVilles' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            $ville = Ville::findOrFail($cpVilles);
            $ville->update($validated);
            DB::commit();
            return redirect()->route('villes.show', $cpVilles)->with('success', 'Ville modifiée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy($cpVilles)
    {
        DB::beginTransaction();
        try {
            $ville = Ville::findOrFail($cpVilles);
            $ville->delete();
            DB::commit();
            return redirect()->route('villes.index')->with('success', 'Ville supprimée!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
