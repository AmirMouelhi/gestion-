@extends('Layout.Style')

@section('content')
<form action="{{ route('Etudiants.store') }}" method="POST" class="mb-5">
    @csrf
    <h4 class="mb-3">Ajouter un Étudiant</h4>
    
    <div class="mb-3">
        <label for="nce" class="form-label">NCE</label>
        <input type="text" class="form-control" id="nce" name="nce" placeholder="Enter NCE" required>
    </div>
    
    <div class="mb-3">
        <label for="nci" class="form-label">NCI</label>
        <input type="text" class="form-control" id="nci" name="nci" placeholder="Enter NCI" required>
    </div>
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter Nom" required>
    </div>
    
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter Prénom" required>
    </div>
    
    <div class="mb-3">
        <label for="datenaissance" class="form-label">Date de Naissance</label>
        <input type="date" class="form-control" id="datenaissance" name="datenaissance" required>
    </div>
    
    <div class="mb-3">
        <label for="cpLieuNaissance" class="form-label">Code Postal Lieu de Naissance</label>
        <input type="text" class="form-control" id="cpLieuNaissance" name="cpLieuNaissance" placeholder="Enter Code Postal" required>
    </div>
    
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter Adresse" required>
    </div>
    
    <div class="mb-3">
        <label for="cpadresse" class="form-label">Code Postal Adresse</label>
        <input type="text" class="form-control" id="cpadresse" name="cpadresse" placeholder="Enter Code Postal" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter Étudiant</button>
</form>
@endsection
