@extends('Layout.Style')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text">📝 Inscriptions</h1>
        <a href="{{ route('inscriptions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle Inscription
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NCE</th>
                            <th>Étudiant</th>
                            <th>Spécialité</th>
                            <th>Niveau</th>
                            <th>Date</th>
                            <th>Résultat</th>
                            <th>Mention</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->nce }}</td>
                            <td>{{ $inscription->etudiant->fullName ?? 'N/A' }}</td>
                            <td>{{ $inscription->specialite->designationSp ?? 'N/A' }}</td>
                            <td>{{ $inscription->niveauInscription }}</td>
                            <td>{{ $inscription->dateInscription }}</td>
                            <td>{{ number_format($inscription->resultatFinale, 2) }}/20</td>
                            <td>
                                <span class="badge 
                                    @if($inscription->mention == 'Très Bien') bg-success
                                    @elseif($inscription->mention == 'Bien') bg-primary
                                    @elseif($inscription->mention == 'Assez Bien') bg-info
                                    @elseif($inscription->mention == 'Passable') bg-warning
                                    @else bg-danger
                                    @endif">
                                    {{ $inscription->mention }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('inscriptions.show', $inscription->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('inscriptions.edit', $inscription->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">Aucune inscription trouvée</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $inscriptions->links() }}
    </div>
</div>
@endsection
