<?php

namespace App\Http\Controllers;

use App\Models\inscription; // Keep lowercase model name
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = inscription::all();
        return view('inscriptions.index', ["inscriptions" => $inscriptions]);
    }

    public function create()
    {
        $inscriptions=inscription::all();
        return view('inscriptions.create',['inscriptions'=>$inscriptions]);
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'nce' => 'required|exists:etudiants,nce',
            'codeSp' => 'required|exists:specialites,codeSp',
            'dateInscription' => 'required|date',
            'niveauInscription' => 'required|integer',
            'resultatFinale' => 'required|numeric',
            'mention' => 'required|string',
        ]);

        inscription::create($info); 
        return redirect()->route('inscriptions.index')->with('success', 'Inscription added successfully.');
    }

    public function show($nce)
    {
        $inscription = inscription::where('nce', $nce)->firstOrFail();
        return view('inscriptions.show', ["inscription" => $inscription]);
    }

    public function destroy($nceInscription)
    {
        $inscription = inscription::where('nceInscription', $nceInscription)->firstOrFail();
        $inscription->delete();
        return redirect()->route('inscriptions.index')->with('success', 'Inscription deleted successfully.');
    }
}
