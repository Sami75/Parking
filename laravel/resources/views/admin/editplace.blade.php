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
                            <th class="col-md-2">Id place</th>
                            <th class="col-md-2">Numéro de place</th>
                            <th class="col-md-2">Statut</th>
                            <th class="col-md-2">Sélectionner</th>

                        </tr>
                        @foreach($places as $place)
                        <tr>
                            <td> {{ $place->idplace }} </td>
                            <td> {{ $place->numplace}} </td>
                            
                                @if($place->reserver == 1)
                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                @else
                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                @endif
                            <td>
                                <a href="{{ route('selectionplace', $place->idplace) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
                            </td>
                        </td>
                        </tr>    
                        @endforeach
                    </table>
                    <a href="{{route('creation')}}"><button type="button" class="btn btn-default btn-sm">Créer</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')