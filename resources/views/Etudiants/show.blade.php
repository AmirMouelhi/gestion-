@extends('Layout.Style')

@section('title', 'Détails de l\'Étudiant')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('Etudiants.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-person-badge-fill text-primary me-2"></i>
                        {{ $Etudiant->fullName }}
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">{{ $Etudiant->nce }}</span>
                        @if($Etudiant->age)
                            <i class="bi bi-cake2 me-1"></i>{{ $Etudiant->age }} ans
                        @endif
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('Etudiants.edit', $Etudiant->nce) }}" class="btn btn-primary">
                    <i class="bi bi-pencil me-2"></i>Modifier
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash me-2"></i>Supprimer
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Personal Information Card -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-person-vcard me-2"></i>Informations Personnelles
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Nom Complet</small>
                                    <strong>{{ $Etudiant->prenom }} {{ $Etudiant->nom }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Numéro NCE</small>
                                    <strong>{{ $Etudiant->nce }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Numéro NCI</small>
                                    <strong>{{ $Etudiant->nci }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Date de Naissance</small>
                                    <strong>
                                        {{ $Etudiant->datenaissance ? $Etudiant->datenaissance->format('d/m/Y') : 'N/A' }}
                                        @if($Etudiant->age)
                                            <span class="text-muted">({{ $Etudiant->age }} ans)</span>
                                        @endif
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-geo"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Lieu de Naissance</small>
                                    <strong>
                                        {{ $Etudiant->lieuNaissance->designationVilles ?? 'Non spécifié' }}
                                        <span class="text-muted">({{ $Etudiant->cpLieuNaissance }})</span>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Card -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-house-door me-2"></i>Adresse
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="d-flex align-items-start mb-3">
                                <div class="icon-box bg-success bg-opacity-10 text-success me-3">
                                    <i class="bi bi-house"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Adresse Complète</small>
                                    <strong>{{ $Etudiant->adresse }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-success bg-opacity-10 text-success me-3">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Ville</small>
                                    <strong>
                                        {{ $Etudiant->ville->designationVilles ?? 'Non spécifié' }}
                                        <span class="text-muted">({{ $Etudiant->cpadresse }})</span>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inscriptions Card -->
            @if($Etudiant->inscriptions->count() > 0)
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-card-checklist me-2"></i>
                            Inscriptions ({{ $Etudiant->inscriptions->count() }})
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Spécialité</th>
                                        <th>Date d'Inscription</th>
                                        <th>Niveau</th>
                                        <th>Résultat</th>
                                        <th>Mention</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Etudiant->inscriptions as $inscription)
                                    <tr>
                                        <td>
                                            <strong>{{ $inscription->specialite->designationSp ?? 'N/A' }}</strong>
                                        </td>
                                        <td>
                                            {{ $inscription->dateInscription ? $inscription->dateInscription->format('d/m/Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $inscription->niveauInscription }}</span>
                                        </td>
                                        <td>
                                            @if($inscription->resultatFinale)
                                                <span class="badge {{ $inscription->resultatFinale >= 10 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $inscription->resultatFinale }}/20
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $inscription->mention ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Notes Card -->
            @if($Etudiant->notes->count() > 0)
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">
                            <i class="bi bi-clipboard-data me-2"></i>
                            Notes ({{ $Etudiant->notes->count() }})
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Matière</th>
                                        <th>Note Contrôle</th>
                                        <th>Note Examen</th>
                                        <th>Résultat Final</th>
                                        <th>Mention</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Etudiant->notes as $note)
                                    <tr>
                                        <td>
                                            <strong>{{ $note->matiere->designationMat ?? 'N/A' }}</strong>
                                        </td>
                                        <td>{{ $note->noteControle ?? '-' }}/20</td>
                                        <td>{{ $note->noteExamen ?? '-' }}/20</td>
                                        <td>
                                            <span class="badge {{ $note->is_passed ? 'bg-success' : 'bg-danger' }}">
                                                {{ $note->resultat }}/20
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $note->is_passed ? 'bg-success' : 'bg-danger' }}">
                                                {{ $note->mention }}
                                            </span>
                                        </td>
                                        <td>{{ $note->DateResultat ? $note->DateResultat->format('d/m/Y') : 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>Confirmer la Suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer l'étudiant <strong>{{ $Etudiant->fullName }}</strong> ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                    Cette action supprimera également toutes les inscriptions et notes associées.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('Etudiants.delete', $Etudiant->nce) }}" method="POST" class="d-inline">
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
@endsection

@push('styles')
<style>
    .icon-box {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 1.2rem;
    }
    .info-item {
        padding: 0.5rem 0;
    }
</style>
@endpush
