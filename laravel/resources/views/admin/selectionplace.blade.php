@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des places de parkings</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('addplace', $membres->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="method" value="PUT">

                        <table class="table">
                            <tr>
                                <th>Id utilisateur</th>
                                <th>Id place</th>
                                <th>Numéro de place</th>
                                <th>Début de réservation</th>
                                <th>Fin de réservation</th>
                            </tr>

                            <tr>
                                @if(!$membres->admin)
                                    <td>{{ $membres->id }}</td>
                                    <td>{{ $membres->idplace }}</td>
                                    <td>{{ $membres->numplace }}</td>
                                    <td>{{ $membres->debutperiode }}</td>
                                    <td>{{ $membres->finperiode }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        </table>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-default btn-sm" value="Submit Button">Modifier</button>
                            <a href="{{ route('editmembre') }}">
                                <button type="button" class="btn btn-default btn-sm">Annuler</button>
                            </a>
                            </a>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')