@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des places de parking</h3></div>

                <div class="panel-body text-center">

                    <table class="table-hover">
                        <tr>
                            <th class="col-md-2">Id d'utilisateur</th>
                            <th class="col-md-2">Id place</th>
                            <th class="col-md-2">Nom</th>
                            <th class="col-md-2">Prenom</th>
                            <th class="col-md-2">Adresse e-mail</th>
                            <th class="col-md-2">Numero place</th>
                            <th class="col-md-2">Début de réservation</th>
                            <th class="col-md-2">Fin de réservation</th>
                            <th class="col-md-2">Sélectionner</th>

                        </tr>
                        @foreach($places as $place)
                            <td> {{ $place->id }} </td>
                            <td> {{ $place->idplace}}
                            <td> {{ $place->nom}}</td>
                            <td> {{ $place->prenom}}</td>
                            <td> {{ $place->email}}</td>
                            <td> {{ $place->numplace}}</td>
                            <td> {{ $place->debutperiode }}</td>
                            <td> {{ $place->finperiode }}</td>
                            @if(!$place->admin)
                            <td >
                                <a href="{{ route('selectionplace', $place->id) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
                            </td>
                            @else
                            <td></td>
                            @endif
                            <td></td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')