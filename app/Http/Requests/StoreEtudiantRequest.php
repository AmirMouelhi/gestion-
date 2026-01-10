<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nce' => 'required|string|max:50|unique:etudiants,nce',
            'nci' => 'required|string|max:50|unique:etudiants,nci',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'datenaissance' => 'required|date|before:today',
            'cpLieuNaissance' => 'required|string|exists:villes,cpVilles',
            'adresse' => 'required|string|max:255',
            'cpadresse' => 'required|string|exists:villes,cpVilles',
        ];
    }

    public function messages()
    {
        return [
            'nce.required' => 'Le numéro NCE est obligatoire.',
            'nce.unique' => 'Ce numéro NCE existe déjà.',
            'nci.required' => 'Le numéro NCI est obligatoire.',
            'nci.unique' => 'Ce numéro NCI existe déjà.',
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'datenaissance.required' => 'La date de naissance est obligatoire.',
            'datenaissance.before' => 'La date de naissance doit être antérieure à aujourd\'hui.',
            'cpLieuNaissance.exists' => 'Le code postal de lieu de naissance est invalide.',
            'cpadresse.exists' => 'Le code postal d\'adresse est invalide.',
        ];
    }
}
