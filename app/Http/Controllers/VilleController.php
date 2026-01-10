<?php

namespace App\Http\Controllers;

use App\Models\ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    public function index()
    {
        $villes = ville::all();
        return view('villes.index', ["villes" => $villes]);
    }

    public function show($id)
{
    $ville = ville::findOrFail($id); 
    return view('villes.show', ["ville" => $ville]); 
}


    public function create()
    {
        $villes=ville::all();
        return view('villes.create',['villes'=>$villes]);
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'cpVilles' => 'required',
            'DesignationVilles' => 'required',
        
        ]);
        ville::create($info);
        return redirect()->route('villes.index');  
    }

    public function destroy($id)
    {
        $villes = ville::findOrFail($id);
        $villes->delete();
        return redirect()->route('villes.index');
    }
}
