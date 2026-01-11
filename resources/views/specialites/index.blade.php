@extends('Layout.Style')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text">🎓 Spécialités</h1>
        <a href="{{ route('specialites.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle Spécialité
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($specialites as $specialite)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm h-100 student-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $specialite->designationSp }}</h5>
                    <p class="card-text">
                        <i class="bi bi-hash me-1"></i><strong>Code:</strong> {{ $specialite->codeSp }}<br>
                        <i class="bi bi-people me-1"></i><strong>Inscriptions:</strong> {{ $specialite->inscriptions_count ?? 0 }}<br>
                        <i class="bi bi-book me-1"></i><strong>Matières:</strong> {{ $specialite->matieres_count ?? 0 }}
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('specialites.show', $specialite->codeSp) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="{{ route('specialites.edit', $specialite->codeSp) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <form action="{{ route('specialites.destroy', $specialite->codeSp) }}" method="POST" class="d-inline">
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
            <p class="text-muted mt-2">Aucune spécialité trouvée</p>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $specialites->links() }}
    </div>
</div>
@endsection
