@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Spécialités</h1>

    @if ($specialites->count() > 0)
        <div class="mt-4">
            @foreach ($specialites as $specialite)
                <p class="fs-5">{{ $specialite->codeSp }} - {{ $specialite->designationSp }}</p>
                <a href="{{ route('specialites.show', $specialite->id) }}" class="btn btn-info btn-sm mb-3">
                    Détails
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $specialites->links() }}
        </div>
    @else
        <p class="fs-5 text-muted">Aucune spécialité trouvée.</p>
    @endif

    <a href="{{ route('specialites.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter une spécialité
    </a>
</div>
@endsection
