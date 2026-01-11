@extends('Layout.Style')

@section('title', 'Modifier une Matière')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('matieres.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier une Matière
                </h1>
                <p class="text-muted mb-0">{{ $matiere->designationMat }}</p>
            </div>
        </div>

        <form action="{{ route('matieres.update', $matiere->codeMat) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-book me-2"></i>Informations de la Matière
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="codeMat" class="form-label">
                                Code Matière <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="codeMat" 
                                    value="{{ $matiere->codeMat }}"
                                    disabled
                                    readonly
                                >
                            </div>
                            <small class="text-muted">Le code ne peut pas être modifié</small>
                        </div>

                        <div class="col-md-8">
                            <label for="designationMat" class="form-label">
                                Désignation <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-book-fill"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('designationMat') is-invalid @enderror" 
                                    id="designationMat" 
                                    name="designationMat" 
                                    value="{{ old('designationMat', $matiere->designationMat) }}"
                                    placeholder="Ex: Mathématiques"
                                    required
                                >
                                @error('designationMat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="coef" class="form-label">
                                Coefficient <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-percent"></i></span>
                                <input 
                                    type="number" 
                                    step="0.1"
                                    class="form-control @error('coef') is-invalid @enderror" 
                                    id="coef" 
                                    name="coef" 
                                    value="{{ old('coef', $matiere->coef) }}"
                                    placeholder="Ex: 2.5"
                                    required
                                >
                                @error('coef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="credit" class="form-label">
                                Crédits <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-star"></i></span>
                                <input 
                                    type="number" 
                                    class="form-control @error('credit') is-invalid @enderror" 
                                    id="credit" 
                                    name="credit" 
                                    value="{{ old('credit', $matiere->credit) }}"
                                    placeholder="Ex: 5"
                                    required
                                >
                                @error('credit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('matieres.index') }}" class="btn btn-outline-secondary">
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
