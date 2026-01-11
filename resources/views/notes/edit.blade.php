@extends('Layout.Style')

@section('title', 'Modifier une Note')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier une Note
                </h1>
                <p class="text-muted mb-0">{{ $note->etudiant->fullName ?? 'N/A' }} - {{ $note->matiere->designationMat ?? 'N/A' }}</p>
            </div>
        </div>

        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-clipboard-check me-2"></i>Informations de la Note
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
                                    <option value="{{ $etudiant->nce }}" {{ old('nce', $note->nce) == $etudiant->nce ? 'selected' : '' }}>
                                        {{ $etudiant->nce }} - {{ $etudiant->fullName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nce')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="codeMat" class="form-label">
                                Matière <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('codeMat') is-invalid @enderror" id="codeMat" name="codeMat" required>
                                <option value="">Sélectionner une matière</option>
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->codeMat }}" {{ old('codeMat', $note->codeMat) == $matiere->codeMat ? 'selected' : '' }}>
                                        {{ $matiere->designationMat }} ({{ $matiere->specialite->designationSp ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('codeMat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="dateResultat" class="form-label">
                                Date du Résultat <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input 
                                    type="date" 
                                    class="form-control @error('dateResultat') is-invalid @enderror" 
                                    id="dateResultat" 
                                    name="dateResultat" 
                                    value="{{ old('dateResultat', $note->dateResultat) }}"
                                    required
                                >
                                @error('dateResultat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="noteControle" class="form-label">
                                Note de Contrôle (40%) <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                <input 
                                    type="number" 
                                    step="0.01"
                                    min="0"
                                    max="20"
                                    class="form-control @error('noteControle') is-invalid @enderror" 
                                    id="noteControle" 
                                    name="noteControle" 
                                    value="{{ old('noteControle', $note->noteControle) }}"
                                    placeholder="Ex: 15.50"
                                    required
                                >
                                <span class="input-group-text">/20</span>
                                @error('noteControle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="noteExamen" class="form-label">
                                Note d'Examen (60%) <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                                <input 
                                    type="number" 
                                    step="0.01"
                                    min="0"
                                    max="20"
                                    class="form-control @error('noteExamen') is-invalid @enderror" 
                                    id="noteExamen" 
                                    name="noteExamen" 
                                    value="{{ old('noteExamen', $note->noteExamen) }}"
                                    placeholder="Ex: 16.00"
                                    required
                                >
                                <span class="input-group-text">/20</span>
                                @error('noteExamen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Note:</strong> Le résultat final est calculé automatiquement : (Note Contrôle × 40%) + (Note Examen × 60%)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary">
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
