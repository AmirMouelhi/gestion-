@extends('Layout.Style')

@section('title', 'Bienvenue - Gestion Étudiants')

@section('content')
<div class="text-center">
    <div class="mb-5">
        <div class="display-1 mb-4">
            <i class="bi bi-mortarboard-fill text-white"></i>
        </div>
        <h1 class="display-3 fw-bold text-white mb-3">
            Bienvenue sur la Plateforme
        </h1>
        <p class="lead text-white mb-4">
            Système de Gestion des Étudiants, Inscriptions et Notes
        </p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('Etudiants.index') }}" class="btn btn-light btn-lg px-5">
                <i class="bi bi-people-fill me-2"></i>Accéder aux Étudiants
            </a>
            @guest
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5">
                <i class="bi bi-box-arrow-in-right me-2"></i>Se Connecter
            </a>
            @endguest
        </div>
    </div>

    <!-- Feature Cards -->
    <div class="row g-4 mt-5">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-lg h-100 text-center">
                <div class="card-body p-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-4 mb-3">
                        <i class="bi bi-people-fill text-primary display-5"></i>
                    </div>
                    <h5 class="card-title">Étudiants</h5>
                    <p class="card-text text-muted">Gérez les informations des étudiants</p>
                    <a href="{{ route('Etudiants.index') }}" class="btn btn-outline-primary">
                        Voir Plus <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-lg h-100 text-center">
                <div class="card-body p-4">
                    <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex p-4 mb-3">
                        <i class="bi bi-card-checklist text-success display-5"></i>
                    </div>
                    <h5 class="card-title">Inscriptions</h5>
                    <p class="card-text text-muted">Suivez les inscriptions</p>
                    <a href="{{ route('inscriptions.index') }}" class="btn btn-outline-success">
                        Voir Plus <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-lg h-100 text-center">
                <div class="card-body p-4">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex p-4 mb-3">
                        <i class="bi bi-clipboard-data text-warning display-5"></i>
                    </div>
                    <h5 class="card-title">Notes</h5>
                    <p class="card-text text-muted">Consultez les résultats</p>
                    <a href="{{ route('notes.index') }}" class="btn btn-outline-warning">
                        Voir Plus <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-lg h-100 text-center">
                <div class="card-body p-4">
                    <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex p-4 mb-3">
                        <i class="bi bi-book-fill text-info display-5"></i>
                    </div>
                    <h5 class="card-title">Matières</h5>
                    <p class="card-text text-muted">Gérez les matières</p>
                    <a href="{{ route('matieres.index') }}" class="btn btn-outline-info">
                        Voir Plus <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="row g-4 mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-4">Plateforme Complète de Gestion</h3>
                    <p class="lead text-muted mb-4">
                        Un système moderne et intuitif pour gérer efficacement votre établissement
                    </p>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="bi bi-speedometer2 text-primary display-4 mb-3"></i>
                                <h6 class="text-muted">Rapide & Efficace</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="bi bi-shield-check text-success display-4 mb-3"></i>
                                <h6 class="text-muted">Sécurisé</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="bi bi-phone text-info display-4 mb-3"></i>
                                <h6 class="text-muted">Responsive</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="bi bi-star-fill text-warning display-4 mb-3"></i>
                                <h6 class="text-muted">Moderne</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
    }
</style>
@endpush
