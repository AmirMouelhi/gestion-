@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Notes</h1>

    @if ($notes->count() > 0)
        <div class="mt-4">
            @foreach ($notes as $note)
                <p class="fs-5">{{ $note->nceNotes }} - {{ $note->codeMatNotes }}</p>
                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-info btn-sm mb-3">
                    Détails
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $notes->links() }}
        </div>
    @else
        <p class="fs-5 text-muted">Aucune note trouvée.</p>
    @endif

    <a href="{{ route('notes.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter une note
    </a>
</div>
@endsection
