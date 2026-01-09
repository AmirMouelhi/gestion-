@extends('Layout.Style')
@section('content')
<form action="{{route('villes.store')}}" method="POST" class="mb-5">
    @csrf
    <h4 class="mb-3">Villes</h4>
    <div class="mb-3">
      <label for="cpVilles" class="form-label">Code Postal Villes</label>
      <input type="text" class="form-control" id="cpVilles" name="cpVilles" placeholder="Enter Code Postal">
    </div>
    <div class="mb-3">
      <label for="designationVilles" class="form-label">Désignation Villes</label>
      <input type="text" class="form-control" id="designationVilles" name="designationVilles" placeholder="Enter Désignation">
    </div>
    <button type="submit" class="btn btn-primary">Submit Villes</button>
  </form>
@endsection