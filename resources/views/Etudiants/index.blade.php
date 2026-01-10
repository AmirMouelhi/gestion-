@extends('Layout.Style')

@section('title', 'Liste des Étudiants')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 mb-1">
            <i class="bi bi-people-fill text-primary me-2"></i>
            Liste des Étudiants
        </h1>
        <p class="text-muted mb-0">
            <i class="bi bi-info-circle me-1"></i>
            {{ $Etudiants->total() }} étudiant(s) au total
        </p>
    </div>
    <a href="{{ route('Etudiants.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Ajouter un étudiant
    </a>
</div>

<!-- Search Bar -->
<div class="row mb-4">
    <div class="col-md-6">
        <form action="{{ route('Etudiants.index') }}" method="GET" class="input-group">
            <span class="input-group-text bg-white">
                <i class="bi bi-search"></i>
            </span>
            <input 
                type="text" 
                name="search" 
                class="form-control border-start-0" 
                placeholder="Rechercher par nom, prénom, NCE ou NCI..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="btn btn-primary">Rechercher</button>
            @if(request('search'))
                <a href="{{ route('Etudiants.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </form>
    </div>
</div>

@if($Etudiants->count() > 0)
    <!-- Students Grid -->
    <div class="row g-4">
        @foreach($Etudiants as $etudiant)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-person-fill text-primary fs-4"></i>
                        </div>
                        <span class="badge bg-primary">{{ $etudiant->nce }}</span>
                    </div>
                    
                    <h5 class="card-title mb-2">
                        {{ $etudiant->prenom }} {{ $etudiant->nom }}
                    </h5>
                    
                    <div class="text-muted small mb-3">
                        <div class="mb-1">
                            <i class="bi bi-card-text me-2"></i>NCI: {{ $etudiant->nci }}
                        </div>
                        <div class="mb-1">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $etudiant->datenaissance ? $etudiant->datenaissance->format('d/m/Y') : 'N/A' }}
                        </div>
                        <div>
                            <i class="bi bi-geo-alt me-2"></i>
                            {{ $etudiant->ville->designationVilles ?? 'Non spécifié' }}
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('Etudiants.show', $etudiant->nce) }}" class="btn btn-sm btn-primary flex-fill">
                            <i class="bi bi-eye me-1"></i>Détails
                        </a>
                        <a href="{{ route('Etudiants.edit', $etudiant->nce) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $Etudiants->links() }}
    </div>
@else
    <div class="text-center py-5">
        <i class="bi bi-inbox display-1 text-muted"></i>
        <h4 class="mt-3 text-muted">Aucun étudiant trouvé</h4>
        @if(request('search'))
            <p class="text-muted">Essayez de modifier vos critères de recherche</p>
            <a href="{{ route('Etudiants.index') }}" class="btn btn-outline-primary">
                Voir tous les étudiants
            </a>
        @else
            <p class="text-muted">Commencez par ajouter votre premier étudiant</p>
            <a href="{{ route('Etudiants.create') }}" class="btn btn-primary mt-2">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un étudiant
            </a>
        @endif
    </div>
@endif
@endsection

@push('styles')
<style>
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }
    .input-group-text {
        border-right: 0;
    }
    .form-control:focus {
        border-color: #dee2e6;
        box-shadow: none;
    }
</style>
@endpush
