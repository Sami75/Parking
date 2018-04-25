@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>File d'attente pour la réservation d'une place de parking</h3></div>

                <div class="panel-body text-center">

                    <table class="table table-stripped">
                        <thead>
                            <th class="text-center">Rang</th>
                            <th class="text-center">Nom d'utilisateur</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prenom</th>
                            <th class="text-center">Adresse e-mail</th>
                            <th class="text-center">Téléphone</th>
                        </thead>

                        @foreach($membres as $membre)
                        <tbody>
                            <tr>
                                @if($membre->rang != null)                            
                                <td >{{ $membre->rang }}</td>
                                <td >{{ $membre->login }}</td>
                                <td >{{ $membre->nom }}</td>
                                <td >{{ $membre->prenom }}</td>
                                <td >{{ $membre->email }}</td>
                                <td >{{ $membre->tel }}</td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                        <div class="col-md-12 text-center">
                    </div>  
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')