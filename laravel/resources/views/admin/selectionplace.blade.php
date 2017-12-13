@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des places de parkings</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update', $places->id) }}">
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
                                @if(!$places->admin)
                                    <td>{{ $places->id }}</td>
                                    <td>{{ $places->login }}</td>
                                    <td>{{ $places->nom }}</td>
                                    <td>{{ $places->prenom }}</td>
                                    <td>{{ $places->email }}</td>
                                    <td>
                                       
                                    <td>
                                        
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
                            <a href="{{ route('supprimer', $places->id) }}">
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