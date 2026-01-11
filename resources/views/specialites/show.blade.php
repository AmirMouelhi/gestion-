@extends('Layout.Style')

@section('title', 'Détails de la Spécialité')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('specialites.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-mortarboard text-primary me-2"></i>
                        {{ $specialite->designationSp }}
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">Code: {{ $specialite->codeSp }}</span>
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('specialites.edit', $specialite->codeSp) }}" class="btn btn-primary">
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
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Code Spécialité</small>
                                    <strong>{{ $specialite->codeSp }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Désignation</small>
                                    <strong>{{ $specialite->designationSp }}</strong>
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
                        <div class="stat-box p-3 bg-light rounded text-center">
                            <div class="h2 mb-0 text-primary">{{ $specialite->inscriptions->count() }}</div>
                            <small class="text-muted">Inscriptions</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($specialite->inscriptions->count() > 0)
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-people me-2"></i>Étudiants Inscrits ({{ $specialite->inscriptions->count() }})
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NCE</th>
                                <th>Nom Complet</th>
                                <th>Date Inscription</th>
                                <th>Niveau</th>
                                <th>Mention</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specialite->inscriptions as $inscription)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $inscription->nce }}</span></td>
                                <td>{{ $inscription->etudiant->fullName ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($inscription->dateInscription)->format('d/m/Y') }}</td>
                                <td>{{ $inscription->niveauInscription }}</td>
                                <td><span class="badge bg-success">{{ $inscription->mention }}</span></td>
                                <td>
                                    <a href="{{ route('Etudiants.show', $inscription->nce) }}" class="btn btn-sm btn-info">
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
                <p>Êtes-vous sûr de vouloir supprimer la spécialité <strong>{{ $specialite->designationSp }}</strong> ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('specialites.destroy', $specialite->codeSp) }}" method="POST" class="d-inline">
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
