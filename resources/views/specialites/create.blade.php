@extends('Layout.Style')
@section('content')
<form action="{{route('specialites.create')}}" method="POST" class="mb-5">
  @csrf
    <h4 class="mb-3">Spécialité</h4>
    <div class="mb-3">
      <label for="codeSp" class="form-label">Code Spécialité</label>
      <input type="text" class="form-control" id="codeSp" name="codeSp" placeholder="Enter Code Spécialité">
    </div>
    <div class="mb-3">
      <label for="designationSp" class="form-label">Désignation Spécialité</label>
      <input type="text" class="form-control" id="designationSp" name="designationSp" placeholder="Enter Désignation">
    </div>
    <button type="submit" class="btn btn-primary">Submit Spécialité</button>
  </form>
@endsection