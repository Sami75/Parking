@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Attribuer manuelle une place de parking</h3></div>

                <div class="panel-body text-center">

                    <table class="table-hover">
                        <tr>
                            <th class="col-md-2">Id utilisateur</th>
                            <th class="col-md-2">Id place</th>
                            <th class="col-md-2">Début de réservation</th>
                            <th class="col-md-2">Fin de réservation</th>

                        </tr>

                        @foreach($membresreserver as $membre)
                        <tr>
                            <td >{{ $membre->id }}</td>
                            <td >{{ $membre->idplace }}</td>
                            <td >{{ $membre->debutperiode }}</td>
                            <td >{{ $membre->finperiode }}</td>
                            <td >
                                <a href="{{ route('addplace', $membre->id) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')