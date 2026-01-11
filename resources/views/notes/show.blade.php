@extends('Layout.Style')

@section('title', 'Détails de la Note')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-clipboard-check text-primary me-2"></i>
                        Détails de la Note
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">{{ $note->etudiant->fullName ?? 'N/A' }}</span>
                        <span class="badge bg-info">{{ $note->matiere->designationMat ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">
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
                            <i class="bi bi-person me-2"></i>Étudiant
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">NCE</small>
                                    <strong>{{ $note->nce }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Nom Complet</small>
                                    <strong>{{ $note->etudiant->fullName ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($note->etudiant)
                        <a href="{{ route('Etudiants.show', $note->nce) }}" class="btn btn-sm btn-outline-primary w-100">
                            <i class="bi bi-eye me-2"></i>Voir le profil
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-book me-2"></i>Matière
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Code Matière</small>
                                    <strong>{{ $note->codeMat }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Désignation</small>
                                    <strong>{{ $note->matiere->designationMat ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($note->matiere)
                        <a href="{{ route('matieres.show', $note->codeMat) }}" class="btn btn-sm btn-outline-info w-100">
                            <i class="bi bi-eye me-2"></i>Voir la matière
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-clipboard-data me-2"></i>Résultats
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-calendar text-muted mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Date</small>
                                    <strong>{{ \Carbon\Carbon::parse($note->dateResultat)->format('d/m/Y') }}</strong>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="text-center p-3 bg-primary bg-opacity-10 rounded">
                                    <i class="bi bi-clipboard-data text-primary mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Contrôle (40%)</small>
                                    <strong class="h4 mb-0">{{ number_format($note->noteControle, 2) }}/20</strong>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="text-center p-3 bg-info bg-opacity-10 rounded">
                                    <i class="bi bi-file-earmark-text text-info mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Examen (60%)</small>
                                    <strong class="h4 mb-0">{{ number_format($note->noteExamen, 2) }}/20</strong>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="text-center p-3 bg-success bg-opacity-10 rounded">
                                    <i class="bi bi-trophy text-success mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Résultat Final</small>
                                    <strong class="h3 mb-0">{{ number_format($note->resultat, 2) }}/20</strong>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert {{ $note->resultat >= 10 ? 'alert-success' : 'alert-danger' }} mb-0">
                                    <div class="d-flex align-items-center">
                                        <i class="bi {{ $note->resultat >= 10 ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }} me-3" style="font-size: 2rem;"></i>
                                        <div>
                                            <strong class="d-block">Statut</strong>
                                            <h4 class="mb-0">{{ $note->resultat >= 10 ? 'Admis' : 'Non Admis' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <p>Êtes-vous sûr de vouloir supprimer cette note ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
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
