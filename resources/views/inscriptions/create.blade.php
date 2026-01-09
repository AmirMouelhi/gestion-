@extends('Layout.Style')
@section('content')
<form action="{{route('inscriptions.store')}}" method="POST" class="mb-5">
  @csrf
    <h4 class="mb-3">Inscription</h4>
    <div class="mb-3">
      <label for="nceInscription" class="form-label">NCE</label>
      <input type="text" class="form-control" id="nce" name="nce" placeholder="Enter NCE">
    </div>
    <div class="mb-3">
      <label for="codeSpInscription" class="form-label">Code Spécialité</label>
      <input type="text" class="form-control" id="codeSp" name="codeSp" placeholder="Enter Code Spécialité">
    </div>
    <div class="mb-3">
      <label for="dateInscription" class="form-label">Date Inscription</label>
      <input type="date" class="form-control" id="dateInscription" name="dateInscription">
    </div>
    <div class="mb-3">
      <label for="niveauInscription" class="form-label">Niveau</label>
      <input type="text" class="form-control" id="niveauInscription" name="niveauInscription" placeholder="Enter Niveau">
    </div>
    <div class="mb-3">
      <label for="resultatFinale" class="form-label">Résultat Finale</label>
      <input type="text" class="form-control" id="resultatFinale" name="resultatFinale" placeholder="Enter Résultat Finale">
    </div>
    <div class="mb-3">
      <label for="mention" class="form-label">Mention</label>
      <input type="text" class="form-control" id="mention" name="mention" placeholder="Enter Mention">
    </div>
    <button type="submit" class="btn btn-primary">Submit Inscription</button>
  </form>

@endsection