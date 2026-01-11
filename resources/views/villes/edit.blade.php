@extends('Layout.Style')

@section('title', 'Modifier une Ville')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('villes.index') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1 class="h2 mb-1">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Modifier une Ville
                </h1>
                <p class="text-muted mb-0">{{ $ville->designationVilles }}</p>
            </div>
        </div>

        <form action="{{ route('villes.update', $ville->cpVilles) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-geo-alt me-2"></i>Informations de la Ville
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="cpVilles" class="form-label">
                                Code Postal <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    id="cpVilles" 
                                    value="{{ $ville->cpVilles }}"
                                    disabled
                                    readonly
                                >
                            </div>
                            <small class="text-muted">Le code postal ne peut pas être modifié</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="designationVilles" class="form-label">
                                Nom de la Ville <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('designationVilles') is-invalid @enderror" 
                                    id="designationVilles" 
                                    name="designationVilles" 
                                    value="{{ old('designationVilles', $ville->designationVilles) }}"
                                    placeholder="Ex: Paris"
                                    required
                                >
                                @error('designationVilles')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('villes.index') }}" class="btn btn-outline-secondary">
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
