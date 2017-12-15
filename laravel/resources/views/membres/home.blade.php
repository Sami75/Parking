@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Utilisateur</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté(e) !

                    <ul id="nav">

                        <li><a href="historique" title="Historique de vos place">Historique</a></li>
                        <li><a href="{{ route('reserverplace') }}" title="Demande de réservation">Réservation</a></li>
                        <li><a href="modifierpwd" title="Modifier son mot de passe">Modifier le mot de passe</a></li>

                    </ul>

                    @if (($rang == '---') && ($numplacemembre == '---'))
                        <p>Veuillez réserver une place de parking si vous souhaitez obtenir une place, si des places sont disponibles votre numéro de place parking vous sera attribué, aprés que l'administrateur vous communiquera les période de réservation, sinon vous serez placé en file d'attente</p>
                    @elseif (($numplacemembre == '---'))
                        <p>Il n'y a plus de place de parking libre !</p>
                        <p>Rang dans la file d'attente : {{ $rang }}
                    @else
                        <p>Votre place de parking : {{ $numplacemembre }}</p>
                        <p>Début de réservation : {{ $debutperiode }}</p>
                        <p>Fin de réservation : {{ $finperiode }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
