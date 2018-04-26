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
                    @if($membrevalider)
                    <div id="list-group">

                        <a href="historique" class="list-group-item" title="Historique de vos place">Historique</a>
                        <a href="{{ route('reserverplace') }}" class="list-group-item" title="Demande de réservation">Réservation</a>
                        <a href="profilemembre" class="list-group-item" title="Modifier son mot de passe">Consulter son profil</a>

                    </div><br/>
                    @else
                        <p>Votre compte est en cours de validation, vous pourrez accéder au menu, lorsque l'administrateur vous aura validé</p>
                    @endif
                    @if (($rang == null) && ($numplacemembre == '---') && ($membrevalider))
                        <p> Veuillez réserver une place de parking si vous souhaitez obtenir une place, si des places sont disponibles votre numéro de place parking vous sera attribué, aprés que l'administrateur vous communiquera les période de réservation, sinon vous serez placé en file d'attente</p>
                    @elseif (($numplacemembre == '---') && ($membrevalider))
                        <p>Il n'y a plus de place de parking libre !</p>
                        <p>Rang dans la file d'attente : {{ $rang }}</p>
                    @elseif (!$datecompare && ($membrevalider))
                        <p>Votre réservation de place est arrivé à écheance, veuillez renouveller votre réservation</p>
                    @elseif ($validation)
                        <p>Votre place de parking : {{ $numplacemembre }}</p>
                        <p>Début de réservation : {{ $debutperiode }}</p>
                        <p>Fin de réservation : {{ $finperiode }}</p>
                    @elseif(!$validation && ($membrevalider))
                        <p>L'administrateur n'a pas valider votre réservation, il est entrain de vous attribuer des dates de réservation, veuillez patientez</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
