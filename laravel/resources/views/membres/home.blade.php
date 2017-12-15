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

                    <?php $rang = Auth::user()->rang ?>

                    @if ($rang == null)
                    {{"Réserver votre place de parking, maintenant, pour connaître votre place dans la file d'attente, ou votre numéro de place de parking"}}
                    @elseif($rang > 0)
                    {{"Votre place dans la file d'attente d'attribution d'une place : " }} {{ $rang }}
                    @else
                    {{"Votre numéro de place de parking : "}} {{ Auth::user()->rang}}
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
