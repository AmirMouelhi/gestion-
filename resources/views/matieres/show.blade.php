@extends('Layout.Style')

@section('title', 'Détails de la Matière')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('matieres.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div>
                    <h1 class="h2 mb-1">
                        <i class="bi bi-book text-primary me-2"></i>
                        {{ $matiere->designationMat }}
                    </h1>
                    <p class="text-muted mb-0">
                        <span class="badge bg-primary me-2">Code: {{ $matiere->codeMat }}</span>
                        <span class="badge bg-info">{{ $matiere->specialite->designationSp ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('matieres.edit', $matiere->codeMat) }}" class="btn btn-primary">
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
                            <i class="bi bi-info-circle me-2"></i>Informations Générales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Code Matière</small>
                                    <strong>{{ $matiere->codeMat }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Désignation</small>
                                    <strong>{{ $matiere->designationMat }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Spécialité</small>
                                    <strong>{{ $matiere->specialite->designationSp ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($matiere->specialite)
                        <a href="{{ route('specialites.show', $matiere->codeSp) }}" class="btn btn-sm btn-outline-info w-100 mt-3">
                            <i class="bi bi-eye me-2"></i>Voir la spécialité
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-clipboard-data me-2"></i>Détails Académiques
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-4 mb-3">
                                <div class="p-3 bg-warning bg-opacity-10 rounded">
                                    <i class="bi bi-layers text-warning mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Niveau</small>
                                    <strong class="h4 mb-0">{{ $matiere->niveau }}</strong>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <i class="bi bi-percent text-primary mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Coefficient</small>
                                    <strong class="h4 mb-0">{{ number_format($matiere->coef, 1) }}</strong>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <div class="p-3 bg-success bg-opacity-10 rounded">
                                    <i class="bi bi-star text-success mb-2" style="font-size: 1.5rem;"></i>
                                    <small class="d-block text-muted">Crédits</small>
                                    <strong class="h4 mb-0">{{ $matiere->credit }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Total Notes:</strong> {{ $matiere->notes->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($matiere->notes->count() > 0)
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-clipboard-check me-2"></i>Notes Enregistrées ({{ $matiere->notes->count() }})
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NCE</th>
                                <th>Étudiant</th>
                                <th>Date</th>
                                <th>Contrôle</th>
                                <th>Examen</th>
                                <th>Résultat</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matiere->notes as $note)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $note->nce }}</span></td>
                                <td>{{ $note->etudiant->fullName ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($note->dateResultat)->format('d/m/Y') }}</td>
                                <td>{{ number_format($note->noteControle, 2) }}/20</td>
                                <td>{{ number_format($note->noteExamen, 2) }}/20</td>
                                <td><strong>{{ number_format($note->resultat, 2) }}/20</strong></td>
                                <td>
                                    @if($note->resultat >= 10)
                                        <span class="badge bg-success">Admis</span>
                                    @else
                                        <span class="badge bg-danger">Non Admis</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('notes.show', $note->id) }}" class="btn btn-sm btn-info">
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
                <p>Êtes-vous sûr de vouloir supprimer la matière <strong>{{ $matiere->designationMat }}</strong> ?</p>
                <p class="text-danger mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('matieres.destroy', $matiere->codeMat) }}" method="POST" class="d-inline">
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
