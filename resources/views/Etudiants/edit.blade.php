@extends('Layout.Style')

@section('title', 'Modifier l\'Étudiant')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('Etudiants.show', $Etudiant->nce) }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier l'Étudiant
                </h1>
                <p class="text-muted mb-0">{{ $Etudiant->fullName }} - {{ $Etudiant->nce }}</p>
            </div>
        </div>

        <form action="{{ route('Etudiants.update', $Etudiant->nce) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Identification Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-card-heading me-2"></i>Informations d'Identification
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nce" class="form-label">
                                NCE <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('nce') is-invalid @enderror" 
                                    id="nce" 
                                    name="nce" 
                                    value="{{ old('nce', $Etudiant->nce) }}"
                                    required
                                >
                                @error('nce')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="nci" class="form-label">
                                NCI <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('nci') is-invalid @enderror" 
                                    id="nci" 
                                    name="nci" 
                                    value="{{ old('nci', $Etudiant->nci) }}"
                                    required
                                >
                                @error('nci')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-person-vcard me-2"></i>Informations Personnelles
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">
                                Nom <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('nom') is-invalid @enderror" 
                                    id="nom" 
                                    name="nom" 
                                    value="{{ old('nom', $Etudiant->nom) }}"
                                    required
                                >
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">
                                Prénom <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('prenom') is-invalid @enderror" 
                                    id="prenom" 
                                    name="prenom" 
                                    value="{{ old('prenom', $Etudiant->prenom) }}"
                                    required
                                >
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="datenaissance" class="form-label">
                                Date de Naissance <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input 
                                    type="date" 
                                    class="form-control @error('datenaissance') is-invalid @enderror" 
                                    id="datenaissance" 
                                    name="datenaissance" 
                                    value="{{ old('datenaissance', $Etudiant->datenaissance?->format('Y-m-d')) }}"
                                    required
                                >
                                @error('datenaissance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cpLieuNaissance" class="form-label">
                                Lieu de Naissance <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <select 
                                    class="form-select @error('cpLieuNaissance') is-invalid @enderror" 
                                    id="cpLieuNaissance" 
                                    name="cpLieuNaissance"
                                    required
                                >
                                    <option value="">Sélectionner une ville</option>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->cpVilles }}" 
                                            {{ old('cpLieuNaissance', $Etudiant->cpLieuNaissance) == $ville->cpVilles ? 'selected' : '' }}>
                                            {{ $ville->designationVilles }} ({{ $ville->cpVilles }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('cpLieuNaissance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-house-door me-2"></i>Adresse
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="adresse" class="form-label">
                                Adresse Complète <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-house"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('adresse') is-invalid @enderror" 
                                    id="adresse" 
                                    name="adresse" 
                                    value="{{ old('adresse', $Etudiant->adresse) }}"
                                    required
                                >
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="cpadresse" class="form-label">
                                Ville <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo"></i></span>
                                <select 
                                    class="form-select @error('cpadresse') is-invalid @enderror" 
                                    id="cpadresse" 
                                    name="cpadresse"
                                    required
                                >
                                    <option value="">Sélectionner</option>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->cpVilles }}" 
                                            {{ old('cpadresse', $Etudiant->cpadresse) == $ville->cpVilles ? 'selected' : '' }}>
                                            {{ $ville->designationVilles }} ({{ $ville->cpVilles }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('cpadresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('Etudiants.show', $Etudiant->nce) }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Enregistrer les Modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
