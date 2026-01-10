<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of students with search and pagination
     */
    public function index(Request $request)
    {
        $query = Etudiant::query()->with(['ville', 'lieuNaissance']);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->search($request->search);
        }

        $etudiants = $query->orderByName()->paginate(12);

        return view('Etudiants.index', [
            'Etudiants' => $etudiants,
            'search' => $request->search
        ]);
    }

    /**
     * Show the form for creating a new student
     */
    public function create()
    {
        $villes = Ville::orderBy('designationVilles')->get();
        return view('Etudiants.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created student in database
     */
    public function store(StoreEtudiantRequest $request)
    {
        try {
            DB::beginTransaction();

            $etudiant = Etudiant::create($request->validated());

            DB::commit();

            return redirect()
                ->route('Etudiants.index')
                ->with('success', 'Étudiant ajouté avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'ajout de l\'étudiant.');
        }
    }

    /**
     * Display the specified student with relationships
     */
    public function show($nce)
    {
        $etudiant = Etudiant::with(['ville', 'lieuNaissance', 'inscriptions.specialite', 'notes.matiere'])
                           ->where('nce', $nce)
                           ->firstOrFail();

        return view('Etudiants.show', ['Etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified student
     */
    public function edit($nce)
    {
        $etudiant = Etudiant::where('nce', $nce)->firstOrFail();
        $villes = Ville::orderBy('designationVilles')->get();
        
        return view('Etudiants.edit', [
            'Etudiant' => $etudiant,
            'villes' => $villes
        ]);
    }

    /**
     * Update the specified student in database
     */
    public function update(UpdateEtudiantRequest $request, $nce)
    {
        try {
            DB::beginTransaction();

            $etudiant = Etudiant::where('nce', $nce)->firstOrFail();
            $etudiant->update($request->validated());

            DB::commit();

            return redirect()
                ->route('Etudiants.show', $etudiant->nce)
                ->with('success', 'Étudiant modifié avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la modification.');
        }
    }

    /**
     * Remove the specified student from database
     */
    public function destroy($nce)
    {
        try {
            DB::beginTransaction();

            $etudiant = Etudiant::where('nce', $nce)->firstOrFail();

            // Delete related records
            $etudiant->inscriptions()->delete();
            $etudiant->notes()->delete();
            $etudiant->delete();

            DB::commit();

            return redirect()
                ->route('Etudiants.index')
                ->with('success', 'Étudiant supprimé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}
