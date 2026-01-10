@extends('Layout.Style')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 text-primary">Les Villes</h1>

    @if ($villes->count() > 0)
        <div class="mt-4">
            @foreach ($villes as $ville)
            <tr>
                <td>{{ $ville->cpVilles }}</td>
                <td>{{ $ville->DesignationVilles }}</td>
                <td>
                    <a href="{{ route('villes.show', $ville->id) }}" class="btn btn-primary">View</a>
                </td>
            </tr>
        @endforeach
        
        </div>

        <div class="mt-4">
            {{ $villes->links() }}
        </div>
    @else
        <p class="fs-5 text-muted">Aucune ville trouvée.</p>
    @endif

    <a href="{{ route('villes.create') }}" class="btn btn-success btn-lg mt-4">
        Ajouter une ville
    </a>
</div>
@endsection
