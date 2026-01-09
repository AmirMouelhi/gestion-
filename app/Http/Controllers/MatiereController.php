<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = matiere::all();
        return view('matieres.index', ["matieres" => $matieres]);
    }

    public function show($id)
    {
        $matieres = matiere::findOrFail($id);
        return view('matieres.show', ["matiere" => $matieres]);  // Fixed view name
    }

    public function create()
    {
        $matieres=matiere::all();
        return view('matieres.create',['matieres'=>$matieres]);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'codeMat' => 'required',
            'codeSp' => 'required|exists:specialites,codeSp',
            'niveau' => 'required',
            'coef' => 'required',
            'credit' => 'required',
        ]);
        matiere::create($valid);
        return redirect()->route('matieres.index');  
    }

    public function destroy($id)
    {
        $matieres = matiere::findOrFail($id);
        $matieres->delete();
        return redirect()->route('matieres.index');
    }
}
