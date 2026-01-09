<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\inscription;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $Etudiants = Etudiant::orderBy('nom')->paginate(10);
        return view('Etudiants.index', ["Etudiants" => $Etudiants]);
    }

    public function create()
    {
        $Etudiants=Etudiant::all();
        return view('Etudiants.create',['Etudiants'=>$Etudiants]);
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'nce' => 'required',
            'nci' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required|date',
            'cpLieuNaissance' => 'required',
            'adresse' => 'required',
            'cpadresse' => 'required',
        ]);

        Etudiant::create($info);
        return redirect()->route('Etudiants.index');
    }

    public function destroy($nce)
    {
        $Etudiants = Etudiant::where('nce', $nce)->first();

        if (!$Etudiants) {
            return redirect()->back()->with('error', 'Student not found.');
        }

       
        inscription::where('nceInscription', $nce)->delete(); 

        $Etudiants->delete();

        return redirect()->route('Etudiants.index')->with('success', 'Student deleted successfully.');
    }

    public function show($nce)
    {
        $Etudiant = Etudiant::where('nce', $nce)->firstOrFail();
        return view('Etudiants.show', ['Etudiants' => $Etudiant]);
    }
}
