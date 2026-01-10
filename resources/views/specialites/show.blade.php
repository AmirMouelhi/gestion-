@extends('Layout.Style')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Détails de la Spécialité</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Code de la Spécialité</th>
                        <td>{{ $specialite->codeSp }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Désignation</th>
                        <td>{{ $specialite->designationSp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <form action="{{ route('specialites.delete', ['codeSp'=>$specialites->codeSp]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer la spécialité</button>
        </form>
    </div>
</div>
@endsection
