@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Id utilisateur</th>
                                <th>Nom d'utilisateur</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse e-mail</th>
                                <th>Rang</th>
                            </tr>

                            <tr>
                                @if(!$membres->admin)
                                    <td>{{ $membres->id }}</td>
                                    <td>{{ $membres->login }}</td>
                                    <td>{{ $membres->nom }}</td>
                                    <td>{{ $membres->prenom }}</td>
                                    <td>{{ $membres->email }}</td>
                                    <td>{{ $membres->rang}}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        </table> 
                        <div class="col-md-12 text-center">
                            <a href="{{ route('editpwd', $membres->id) }}">
                                <button type="button" class="btn btn-default btn-sm">Modifier le mot de passe</button>
                            </a>
                            <a href="{{ route('editrang', $membres->id) }}">
                                <button type="button" class="btn btn-default btn-sm">Modifier le rang</button>
                            </a>
                            <a href="{{ route('editmembre') }}">
                                <button type="button" class="btn btn-default btn-sm">Annuler</button>
                            </a>
                            <a href="{{ route('supprimer', $membres->id) }}">
                                <button type="button" class="btn btn-default btn-sm">Supprimer</button>
                            </a>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')