@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Historique des réservations</h3></div>

                <div class="panel-body text-center">

                    <table class="table-hover">
                    	<tr>
                            <th class="col-md-2">Numéro de place</th>
                            <th class="col-md-2">Début de réservation</th>
   	                        <th class="col-md-2">Fin de réservation</th>
   	                        <th class="col-md-2">Valider</th>
   	                    </tr>
   	                    
                        <tr>
                            @foreach($reservations as $reservation)
                            @foreach($places as $place)
                            @if($place->idplace == $reservation->idplace)
                            	<td> {{ $place->numplace }} </td>
                            	<td> {{ $reservation->debutperiode }} </td>
                            	<td> {{ $reservation->finperiode}} </td>
                            @elseif($reservation->valider == 1)
                               	<td><span class="glyphicon glyphicon-ok"></span></td>
                            @else
                                <td><span class="glyphicon glyphicon-remove"></span></td>
                            @endif

                        </tr>
                        @endforeach
                        @endforeach    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')