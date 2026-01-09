@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Étudiants</h1>

   
    @if ($Etudiants->count() > 0)
        <div class="mt-4">
            @foreach ($Etudiants as $Etudiant)
                <p class="fs-5">{{ $Etudiant->nom }} - {{ $Etudiant->prenom }}</p>
                <a href="{{ route('Etudiants.show', $Etudiant->nce) }}" class="btn btn-info btn-sm mb-3">
                    Details
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $Etudiants->links() }}
        </div>
    @else
        
        <p class="fs-5 text-muted">Aucun étudiant trouvé.</p>
    @endif

    
    <a href="{{ route('Etudiants.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter un étudiant
    </a>
</div>
@endsection
