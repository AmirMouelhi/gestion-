@extends('Layout.Style')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Détails de l'Inscription</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">NCE</th>
                        <td>{{ $inscription->nceInscription }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code Spécialité</th>
                        <td>{{ $inscription->codeSpInscription }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date d'Inscription</th>
                        <td>{{ $inscription->dateInscription }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Niveau</th>
                        <td>{{ $inscription->niveauInscription }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Résultat Final</th>
                        <td>{{ $inscription->resultatFinale }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mention</th>
                        <td>{{ $inscription->mention }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <form action="{{ route('inscriptions.delete', ['nceInscription' => $inscription->nceInscription]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection