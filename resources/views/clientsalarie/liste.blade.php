@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Liste des medecins</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <th>Identifiant du medecin</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Numéro Téléphone</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($liste_medecins as $medecin)
                                <tr>
                                    <td>{{ $medecin->id }}</td>
                                    <td>{{ $medecin->prenom }}</td>
                                    <td>{{ $medecin->nom }}</td>
                                    <td>{{ $medecin->telephone }}</td>
                                    <td><a href="{{ route('editmedecin', ['id' => $medecin->id]) }}">Editer</a></td>
                                    <td><a href="{{ route('deletemedecin', ['id' => $medecin->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce medecin ?');" >Supprimer</a></td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $liste_medecins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
