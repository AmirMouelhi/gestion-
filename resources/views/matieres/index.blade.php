@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Matières</h1>

    @if ($matieres->count() > 0)
        <div class="mt-4">
            @foreach ($matieres as $matiere)
                <p class="fs-5">{{ $matiere->codeMat }} - {{ $matiere->codeSpMat }}</p>
                <a href="{{ route('matieres.show', $matiere->id) }}" class="btn btn-info btn-sm mb-3">
                    Détails
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $matieres->links() }}
        </div>
    @else
        <p class="fs-5 text-muted">Aucune matière trouvée.</p>
    @endif

    <a href="{{ route('matieres.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter une matière
    </a>
</div>
@endsection
