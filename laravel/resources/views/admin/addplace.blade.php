@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Attribuer manuelle une place de parking</h3></div>

                <div class="panel-body text-center">

                    <form class="form-horizontal" method="POST" action="{{ route('updateplace', $membre->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="method" value="PUT">
                    <table class="table-hover">
                        <tr>
                            <th class="col-md-2">Id utilisateur</th>
                            <th class="col-md-2">Login</th>
                            <th class="col-md-2">Nom</th>
                            <th class="col-md-2">Prénom</th>
                            <th class="col-md-2">Adresse e-mail</th>
                            <th class="col-md-2">Téléphone</th>
                            <th class="col-md-2">Numéros de place</th>
                        </tr>
                        <tr>
                            <td >{{ $membre->id }}</td>
                            <td >{{ $membre->login }}</td>
                            <td >{{ $membre->nom }}</td>
                            <td >{{ $membre->prenom }}</td>
                            <td >{{ $membre->email }}</td>
                            <td >{{ $membre->tel }}</td>
                            <td >{{ $numplace->numplace }}</td>
                        </tr>
                    </table>

                    <div class="form-group{{ $errors->has('debutperiode') ? ' has-error' : '' }}">
                        <label for="debutperiode" class="col-md-4 control-label">Début de réservation</label>
                        <div class="col-md-6">
                            <input id="debutperiode" type="text" class="form-control" name="debutperiode" placeholder="{{$reservation->debutperiode}}" required autofocus>

                            @if ($errors->has('debutperiode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('debutperiode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('finperiode') ? ' has-error' : '' }}">
                        <label for="finperiode" class="col-md-4 control-label">Fin de réservation</label>
                        <div class="col-md-6">
                            <input id="finperiode" type="text" class="form-control" name="finperiode" placeholder="{{$reservation->finperiode}}" required autofocus>

                            @if ($errors->has('finperiode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('finperiode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-default btn-sm" value="Submit Button">Modifier</button>
                        <a href="{{ route('ajoutplace') }}">
                            <button type="button" class="btn btn-default btn-sm">Annuler</button>
                        </a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')