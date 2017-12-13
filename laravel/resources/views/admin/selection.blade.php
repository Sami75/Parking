@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update', $membres->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="method" value="PUT">

                        <table class="table">
                            <tr>
                                <th>Id utilisateur</th>
                                <th>Nom d'utilisateur</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse e-mail</th>
                                <th>Mot de passe</th>
                                <th>Rang</th>
                            </tr>

                            <tr>
                                @if(!$membres->admin)
                                    <td>{{ $membres->id }}</td>
                                    <td>{{ $membres->login }}</td>
                                    <td>{{ $membres->nom }}</td>
                                    <td>{{ $membres->prenom }}</td>
                                    <td>{{ $membres->email }}</td>
                                    <td>
                                        <input type="password" name="password" placeholder="Entrer le mot de passe">
                                        {!! $errors->first('password', '<p class="error">:message</p>') !!}
                                    <td>
                                        <input type="text" name="rang" placeholder="Entrer le rang" value="{{ old('rang') ?? $membres->rang }}" size="1">
                                        {!! $errors->first('rang', '<p class="error">:message</p>') !!}
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        </table> 
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