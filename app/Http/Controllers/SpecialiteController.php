<?php

namespace App\Http\Controllers;

use App\Models\specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function index()
    {
        $specialites = specialite::all();
        return view('specialites.index', ["specialites" => $specialites]);
    }

    public function show($id)
    {
        $specialites = specialite::findOrFail($id);
        return view('specialites.show', ["specialite" => $specialites]);  
    }

    public function create()
    {
        $specialites=specialite::all();
        
        return view('specialites.create');
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'codeSp' => 'required',
            'designationSp' => 'required',
        ]);
        specialite::create($info);
        return redirect()->route('specialites.create');  
    }

    public function destroy($id)
    {
        $specialites = specialite::findOrFail($id);
        $specialites->delete();
        return redirect()->route('specialites.index');
    }
}
