@extends('Layout.Style')
@section('content')
<form action="{{route('matieres.store')}}" method="POST" class="mb-5">
  @csrf
    <h4 class="mb-3">Matière</h4>
    <div class="mb-3">
      <label for="codeMat" class="form-label">Code Matière</label>
      <input type="text" class="form-control" id="codeMat" name="codeMat" placeholder="Enter Code Matière">
    </div>
    <div class="mb-3">
      <label for="codeSp" class="form-label">Code Spécialité</label>
      <input type="text" class="form-control" id="codeSp" name="codeSp" placeholder="Enter Code Spécialité">
    </div>
    <div class="mb-3">
      <label for="niveau" class="form-label">Niveau</label>
      <input type="text" class="form-control" id="niveau" name="niveau" placeholder="Enter Niveau">
    </div>
    <div class="mb-3">
      <label for="coef" class="form-label">Coefficient</label>
      <input type="number" class="form-control" id="coef" name="coef" placeholder="Enter Coefficient">
    </div>
    <div class="mb-3">
      <label for="credit" class="form-label">Crédit</label>
      <input type="number" class="form-control" id="credit" name="credit" placeholder="Enter Crédit">
    </div>
    <button type="submit" class="btn btn-primary">Submit Matière</button>
  </form>
  @endsection
