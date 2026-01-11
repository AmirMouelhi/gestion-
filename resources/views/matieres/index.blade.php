@extends('Layout.Style')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text">📚 Matières</h1>
        <a href="{{ route('matieres.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle Matière
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($matieres as $matiere)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 student-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Code: {{ $matiere->codeMat }}</h5>
                    <p class="card-text">
                        <i class="bi bi-award me-1"></i><strong>Spécialité:</strong> {{ $matiere->specialite->designationSp ?? 'N/A' }}<br>
                        <i class="bi bi-bar-chart me-1"></i><strong>Niveau:</strong> {{ $matiere->niveau }}<br>
                        <i class="bi bi-calculator me-1"></i><strong>Coefficient:</strong> {{ $matiere->coef }}<br>
                        <i class="bi bi-star me-1"></i><strong>Crédits:</strong> {{ $matiere->credit }}
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('matieres.show', $matiere->codeMat) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="{{ route('matieres.edit', $matiere->codeMat) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <form action="{{ route('matieres.destroy', $matiere->codeMat) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-2">Aucune matière trouvée</p>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $matieres->links() }}
    </div>
</div>
@endsection
