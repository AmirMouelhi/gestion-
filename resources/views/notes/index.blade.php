@extends('Layout.Style')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text">📊 Notes</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle Note
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
                            <th>Matière</th>
                            <th>Date</th>
                            <th>Contrôle</th>
                            <th>Examen</th>
                            <th>Résultat</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notes as $note)
                        <tr>
                            <td>{{ $note->nce }}</td>
                            <td>{{ $note->etudiant->fullName ?? 'N/A' }}</td>
                            <td>{{ $note->codeMat }}</td>
                            <td>{{ $note->dateResultat }}</td>
                            <td>{{ number_format($note->noteControle, 2) }}</td>
                            <td>{{ number_format($note->noteExamen, 2) }}</td>
                            <td><strong>{{ number_format($note->resultat, 2) }}/20</strong></td>
                            <td>
                                @if($note->resultat >= 10)
                                    <span class="badge bg-success">Réussi</span>
                                @else
                                    <span class="badge bg-danger">Échoué</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
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
                            <td colspan="9" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">Aucune note trouvée</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $notes->links() }}
    </div>
</div>
@endsection
