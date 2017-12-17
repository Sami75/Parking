@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Historique de vos réservation</h3>
                	{{ $membre->nom}}
                    {{ $membre->prenom}}</div>

                <div class="panel-body text-center">

                    <table class="table-hover">
                    	<tr>
                            <th class="col-md-2">Numéro de place</th>
                            <th class="col-md-2">Date de réservation</th>
   	                        <th class="col-md-2">Fin de réservation</th>
   	                    </tr>
   	                    @foreach($reservations as $reservation)
                        <tr>
                            @php
                            	$places = DB::table('places')->select('numplace')->where('idplace', '=', $reservation->idplace)->get();
                            @endphp
                            @foreach($places as $place)
                            <td> {{ $place->numplace }} </td>
                            @endforeach
                            <td> {{ $reservation->debutperiode }} </td>
                            <td> {{ $reservation->finperiode}} </td>
                        </tr>
                        @endforeach    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')