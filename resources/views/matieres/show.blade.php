@extends('Layout.Style')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Détails de la Matière</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Code de la Matière</th>
                        <td>{{ $matiere->codeMat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code Spécialité</th>
                        <td>{{ $matiere->codeSpMat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Niveau</th>
                        <td>{{ $matiere->niveau }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Coefficient</th>
                        <td>{{ $matiere->coef }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Crédit</th>
                        <td>{{ $matiere->credit }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <form action="{{ route('matieres.delete', ['codeMat'=>$matieres->codeMat]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer la matière</button>
        </form>
    </div>
</div>
@endsection
