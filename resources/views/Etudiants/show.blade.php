@extends('Layout.Style')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Student Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $Etudiants->nom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">First Name</th>
                        <td>{{ $Etudiants->prenom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NCE</th>
                        <td>{{ $Etudiants->nce }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NCI</th>
                        <td>{{ $Etudiants->nci }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td>{{ $Etudiants->datenaissance }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Place of Birth</th>
                        <td>{{ $Etudiants->cpLieuNaissance }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{ $Etudiants->adresse }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Postal Code</th>
                        <td>{{ $Etudiants->cpadresse }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="mt-3">
        <form action="{{ route('Etudiants.delete', ['nce' => $Etudiants->nce]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>

        </form>
        </form>
    </div>
</div>
@endsection
