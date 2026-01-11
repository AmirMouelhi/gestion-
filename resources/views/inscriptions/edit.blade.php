@extends('Layout.Style')

@section('title', 'Modifier une Inscription')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('inscriptions.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier une Inscription
                </h1>
                <p class="text-muted mb-0">{{ $inscription->etudiant->fullName ?? 'N/A' }} - {{ $inscription->specialite->designationSp ?? 'N/A' }}</p>
            </div>
        </div>

        <form action="{{ route('inscriptions.update', $inscription->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-person-check me-2"></i>Informations de l'Inscription
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nce" class="form-label">
                                Étudiant (NCE) <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('nce') is-invalid @enderror" id="nce" name="nce" required>
                                <option value="">Sélectionner un étudiant</option>
                                @foreach($etudiants as $etudiant)
                                    <option value="{{ $etudiant->nce }}" {{ old('nce', $inscription->nce) == $etudiant->nce ? 'selected' : '' }}>
                                        {{ $etudiant->nce }} - {{ $etudiant->fullName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nce')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="codeSp" class="form-label">
                                Spécialité <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('codeSp') is-invalid @enderror" id="codeSp" name="codeSp" required>
                                <option value="">Sélectionner une spécialité</option>
                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->codeSp }}" {{ old('codeSp', $inscription->codeSp) == $specialite->codeSp ? 'selected' : '' }}>
                                        {{ $specialite->designationSp }}
                                    </option>
                                @endforeach
                            </select>
                            @error('codeSp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="dateInscription" class="form-label">
                                Date d'Inscription <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input 
                                    type="date" 
                                    class="form-control @error('dateInscription') is-invalid @enderror" 
                                    id="dateInscription" 
                                    name="dateInscription" 
                                    value="{{ old('dateInscription', $inscription->dateInscription) }}"
                                    required
                                >
                                @error('dateInscription')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="niveauInscription" class="form-label">
                                Niveau <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-layers"></i></span>
                                <select class="form-select @error('niveauInscription') is-invalid @enderror" id="niveauInscription" name="niveauInscription" required>
                                    <option value="">Sélectionner</option>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('niveauInscription', $inscription->niveauInscription) == $i ? 'selected' : '' }}>
                                            Niveau {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('niveauInscription')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="resultatFinale" class="form-label">
                                Résultat Final <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-graph-up"></i></span>
                                <input 
                                    type="number" 
                                    step="0.01"
                                    min="0"
                                    max="20"
                                    class="form-control @error('resultatFinale') is-invalid @enderror" 
                                    id="resultatFinale" 
                                    name="resultatFinale" 
                                    value="{{ old('resultatFinale', $inscription->resultatFinale) }}"
                                    placeholder="Ex: 15.50"
                                    required
                                >
                                @error('resultatFinale')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="mention" class="form-label">
                                Mention <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-award"></i></span>
                                <select class="form-select @error('mention') is-invalid @enderror" id="mention" name="mention" required>
                                    <option value="">Sélectionner</option>
                                    <option value="Passable" {{ old('mention', $inscription->mention) == 'Passable' ? 'selected' : '' }}>Passable</option>
                                    <option value="Assez Bien" {{ old('mention', $inscription->mention) == 'Assez Bien' ? 'selected' : '' }}>Assez Bien</option>
                                    <option value="Bien" {{ old('mention', $inscription->mention) == 'Bien' ? 'selected' : '' }}>Bien</option>
                                    <option value="Très Bien" {{ old('mention', $inscription->mention) == 'Très Bien' ? 'selected' : '' }}>Très Bien</option>
                                    <option value="Excellent" {{ old('mention', $inscription->mention) == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                </select>
                                @error('mention')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('inscriptions.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
