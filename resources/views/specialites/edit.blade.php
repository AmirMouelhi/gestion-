@extends('Layout.Style')

@section('title', 'Modifier une Spécialité')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('specialites.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier une Spécialité
                </h1>
                <p class="text-muted mb-0">{{ $specialite->designationSp }}</p>
            </div>
        </div>

        <form action="{{ route('specialites.update', $specialite->codeSp) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-mortarboard me-2"></i>Informations de la Spécialité
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="codeSp" class="form-label">
                                Code Spécialité <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="codeSp" 
                                    value="{{ $specialite->codeSp }}"
                                    disabled
                                    readonly
                                >
                            </div>
                            <small class="text-muted">Le code ne peut pas être modifié</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="designationSp" class="form-label">
                                Désignation <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-mortarboard-fill"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('designationSp') is-invalid @enderror" 
                                    id="designationSp" 
                                    name="designationSp" 
                                    value="{{ old('designationSp', $specialite->designationSp) }}"
                                    placeholder="Ex: Informatique"
                                    required
                                >
                                @error('designationSp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('specialites.index') }}" class="btn btn-outline-secondary">
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
