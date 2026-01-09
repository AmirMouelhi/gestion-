<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Détails de la Ville</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Code Postal</th>
                        <td>{{ $ville->cpVilles }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Désignation</th>
                        <td>{{ $ville->DesignationVilles }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <form action="{{ route('villes.delete',['cpVilles'=>$villes->cpVilles]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer la ville</button>
        </form>
    </div>
</div>
