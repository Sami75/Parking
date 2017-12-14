@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('updatepwd', $membres->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="method" value="PUT">

                        <table class="table">
                            <tr>
                                <th>Id utilisateur</th>
                                <th>Nom d'utilisateur</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse e-mail</th>
                            </tr>

                            <tr>
                                @if(!$membres->admin)
                                    <td>{{ $membres->id }}</td>
                                    <td>{{ $membres->login }}</td>
                                    <td>{{ $membres->nom }}</td>
                                    <td>{{ $membres->prenom }}</td>
                                    <td>{{ $membres->email }}</td>
                                    <td>
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
                            <a href="{{ route('supprimer', $membres->id) }}">
                                <button type="button" class="btn btn-default btn-sm">Supprimer</button>
                            </a>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')