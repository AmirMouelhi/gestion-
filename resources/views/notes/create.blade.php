@extends('Layout.Style')
@section('content')
<form action="{{route('notes.store')}}" method="POST" class="mb-5">
  @csrf
    <h4 class="mb-3">Notes</h4>
    <div class="mb-3">
      <label for="nceNotes" class="form-label">NCE</label>
      <input type="text" class="form-control" id="nceNotes" name="nceNotes" placeholder="Enter NCE">
    </div>
    <div class="mb-3">
      <label for="codeMatNotes" class="form-label">Code Matière</label>
      <input type="text" class="form-control" id="codeMatNotes" name="codeMatNotes" placeholder="Enter Code Matière">
    </div>
    <div class="mb-3">
      <label for="dateResultat" class="form-label">Date Résultat</label>
      <input type="date" class="form-control" id="dateResultat" name="dateResultat">
    </div>
    <div class="mb-3">
      <label for="noteControle" class="form-label">Note Contrôle</label>
      <input type="number" step="0.01" class="form-control" id="noteControle" name="noteControle" placeholder="Enter Note Contrôle">
    </div>
    <div class="mb-3">
      <label for="noteExamen" class="form-label">Note Examen</label>
      <input type="number" step="0.01" class="form-control" id="noteExamen" name="noteExamen" placeholder="Enter Note Examen">
    </div>
    <div class="mb-3">
      <label for="resultat" class="form-label">Résultat</label>
      <input type="text" class="form-control" id="resultat" name="resultat" placeholder="Enter Résultat">
    </div>
    <button type="submit" class="btn btn-primary">Submit Notes</button>
  </form>
@endsection