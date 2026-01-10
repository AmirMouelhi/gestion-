@extends('Layout.Style')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Détails de la Note</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">NCE</th>
                        <td>{{ $note->nceNotes }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code de la Matière</th>
                        <td>{{ $note->codeMatNotes }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date de Résultat</th>
                        <td>{{ $note->dateResultat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Note de Contrôle</th>
                        <td>{{ $note->noteControle }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Note d'Examen</th>
                        <td>{{ $note->noteExamen }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Résultat</th>
                        <td>{{ $note->resultat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <form action="{{ route('notes.delete',['dateresultat',$notes->dateresultat]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer la note</button>
        </form>
    </div>
</div>
@endsection

