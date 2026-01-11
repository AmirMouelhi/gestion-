@extends('Layout.Style')

@section('title', 'Détails de l\'Inscription')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('inscriptions.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-person-check text-primary me-2"></i>
                        Détails de l'Inscription
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">{{ $inscription->etudiant->fullName ?? 'N/A' }}</span>
                        <span class="badge bg-info">{{ $inscription->specialite->designationSp ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('inscriptions.edit', $inscription->id) }}" class="btn btn-primary">
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
                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">NCE</small>
                                    <strong>{{ $inscription->nce }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Nom Complet</small>
                                    <strong>{{ $inscription->etudiant->fullName ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($inscription->etudiant)
                        <a href="{{ route('Etudiants.show', $inscription->nce) }}" class="btn btn-sm btn-outline-primary w-100">
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
                            <i class="bi bi-mortarboard me-2"></i>Spécialité
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Code Spécialité</small>
                                    <strong>{{ $inscription->codeSp }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Désignation</small>
                                    <strong>{{ $inscription->specialite->designationSp ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($inscription->specialite)
                        <a href="{{ route('specialites.show', $inscription->codeSp) }}" class="btn btn-sm btn-outline-info w-100">
                            <i class="bi bi-eye me-2"></i>Voir la spécialité
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-clipboard-check me-2"></i>Détails de l'Inscription
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="info-item">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-success bg-opacity-10 text-success me-3">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Date d'Inscription</small>
                                            <strong>{{ \Carbon\Carbon::parse($inscription->dateInscription)->format('d/m/Y') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="info-item">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-warning bg-opacity-10 text-warning me-3">
                                            <i class="bi bi-layers"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Niveau</small>
                                            <strong>Niveau {{ $inscription->niveauInscription }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="info-item">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Résultat Final</small>
                                            <strong>{{ number_format($inscription->resultatFinale, 2) }}/20</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-success mb-0">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-award-fill me-3" style="font-size: 2rem;"></i>
                                        <div>
                                            <strong class="d-block">Mention</strong>
                                            <h4 class="mb-0">{{ $inscription->mention }}</h4>
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
                <p>Êtes-vous sûr de vouloir supprimer cette inscription ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" class="d-inline">
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
