@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Inscriptions</h1>

    @if ($inscriptions->count() > 0)
        <div class="mt-4">
            @foreach ($inscriptions as $inscription)
                <p class="fs-5">
                    {{ $inscription->nceInscription }} - {{ $inscription->codeSpInscription }} 
                    ({{ $inscription->dateInscription }})
                </p>
                <a href="{{ route('inscriptions.show', $inscription->id) }}" class="btn btn-info btn-sm mb-3">
                    Détails
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $inscriptions->links() }}
        </div>
    @else
        <p class="fs-5 text-muted">Aucune inscription trouvée.</p>
    @endif

    <a href="{{ route('inscriptions.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter une inscription
    </a>
</div>
@endsection
