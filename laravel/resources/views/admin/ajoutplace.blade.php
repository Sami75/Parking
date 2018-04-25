@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Attribuer manuelle une place de parking</h3></div>

                <div class="panel-body text-center">

                    <table class="table table*stripped">
                        <thead>
                            <th class="text-center">Id utilisateur</th>
                            <th class="text-center">Id place</th>
                            <th class="text-center">Début de réservation</th>
                            <th class="text-center">Fin de réservation</th>
                            <th class="text-center">Sélectionner</th>
                        </thead>

                        @foreach($membresreserver as $membre)
                        <tbody>
                            <tr>
                                @if(!$membre->valider)
                                <td >{{ $membre->id }}</td>
                                <td >{{ $membre->idplace }}</td>
                                <td >{{ $membre->debutperiode }}</td>
                                <td >{{ $membre->finperiode }}</td>
                                <td >
                                    <a href="{{ route('addplace', $membre->id) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')