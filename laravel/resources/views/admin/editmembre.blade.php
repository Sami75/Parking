@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body text-center">

                    <table class="table-striped">
                        <tr>
                            <th class="col-md-2">Id utilisateur</th>
                            <th class="col-md-2">Nom d'utilisateur</th>
                            <th class="col-md-2">Nom</th>
                            <th class="col-md-2">Prenom</th>
                            <th class="col-md-2">Adresse e-mail</th>
                            <th class="col-md-2">Téléphone</th>
                            <th class="col-md-2">Rang</th>
                            <th class="col-md-2">Sélectionner</th>

                        </tr>

                        @foreach($membres as $membre)
                        <tr>
                            <td >{{ $membre->id }}</td>
                            <td >{{ $membre->login }}</td>
                            <td >{{ $membre->nom }}</td>
                            <td >{{ $membre->prenom }}</td>
                            <td >{{ $membre->email }}</td>
                            <td >{{ $membre->tel }}</td>
                            <td >{{ $membre->rang }}</td>
                            @if(!$membre->admin)
                            <td >
                                <a href="{{ route('selection', $membre->id) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
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