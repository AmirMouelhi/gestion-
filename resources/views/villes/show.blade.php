@extends('Layout.Style')

@section('title', 'Détails de la Ville')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('villes.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-building text-primary me-2"></i>
                        {{ $ville->designationVilles }}
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">CP: {{ $ville->cpVilles }}</span>
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('villes.edit', $ville->cpVilles) }}" class="btn btn-primary">
                    <i class="bi bi-pencil me-2"></i>Modifier
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash me-2"></i>Supprimer
                </button>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-info-circle me-2"></i>Informations
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-mailbox"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Code Postal</small>
                                    <strong>{{ $ville->cpVilles }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Nom de la Ville</small>
                                    <strong>{{ $ville->designationVilles }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-graph-up me-2"></i>Statistiques
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 mb-3">
                                <div class="stat-box p-3 bg-light rounded">
                                    <div class="h2 mb-0 text-primary">{{ $ville->etudiantsNesIci->count() }}</div>
                                    <small class="text-muted">Étudiants Nés</small>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="stat-box p-3 bg-light rounded">
                                    <div class="h2 mb-0 text-info">{{ $ville->etudiantsHabitantIci->count() }}</div>
                                    <small class="text-muted">Étudiants Habitant</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($ville->etudiantsNesIci->count() > 0)
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-people me-2"></i>Étudiants Nés dans cette Ville ({{ $ville->etudiantsNesIci->count() }})
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NCE</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de Naissance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ville->etudiantsNesIci as $etudiant)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $etudiant->nce }}</span></td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ \Carbon\Carbon::parse($etudiant->dateNaissance)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('Etudiants.show', $etudiant->nce) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @if($ville->etudiantsHabitantIci->count() > 0)
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="bi bi-house me-2"></i>Étudiants Habitant dans cette Ville ({{ $ville->etudiantsHabitantIci->count() }})
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NCE</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ville->etudiantsHabitantIci as $etudiant)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $etudiant->nce }}</span></td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->adresse }}</td>
                                <td>
                                    <a href="{{ route('Etudiants.show', $etudiant->nce) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>Confirmer la Suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer la ville <strong>{{ $ville->designationVilles }}</strong> ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('villes.destroy', $ville->cpVilles) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.icon-box {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}
</style>
@endsection
