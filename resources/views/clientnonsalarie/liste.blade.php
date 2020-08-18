@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Liste des Clients</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success text-center">{{$confirmation}}</div>
                        @elseif(isset($erreur))
                            <div class="alert alert-danger text-center">{{$erreur}}</div>
                        @endif
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <th>Identifiant du client</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Numéro Téléphone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($liste_non_salarie as $clientnonsalarie)
                                <tr>
                                    <td>{{ $clientnonsalarie->id }}</td>
                                    <td>{{ $clientnonsalarie->prenom }}</td>
                                    <td>{{ $clientnonsalarie->nom }}</td>
                                    <td>{{ \App\Clients::find($clientnonsalarie->id_client)->adresse }}</td>
                                    <td>{{ \App\Clients::find($clientnonsalarie->id_client)->telephone }}</td>
                                    <td>{{ \App\Clients::find($clientnonsalarie->id_client)->email }}</td>
                                    <td><a href="{{ route('editclientnonsalarie', ['id' => $clientnonsalarie->id]) }}">Editer</a></td>
                                    <!--<td><a href="{ { route('deletemedecin', ['id' => $medecin->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce medecin ?');" >Supprimer</a></td>-->
                                </tr>
                            @endforeach
                        </table>
                        {{ $liste_non_salarie->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
