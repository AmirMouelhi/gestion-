@extends('Layout.Style')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text">🏙️ Villes</h1>
        <a href="{{ route('villes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle Ville
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
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Étudiants Nés</th>
                            <th>Étudiants Habitant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($villes as $ville)
                        <tr>
                            <td><strong>{{ $ville->cpVilles }}</strong></td>
                            <td>{{ $ville->designationVilles }}</td>
                            <td>{{ $ville->etudiants_nes_ici_count ?? 0 }}</td>
                            <td>{{ $ville->etudiants_habitant_ici_count ?? 0 }}</td>
                            <td>
                                <a href="{{ route('villes.show', $ville->cpVilles) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('villes.edit', $ville->cpVilles) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('villes.destroy', $ville->cpVilles) }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">Aucune ville trouvée</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $villes->links() }}
    </div>
</div>
@endsection
