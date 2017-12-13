@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{ route('selection', '$membres') }}">
                        {{ csrf_field() }}

                         <table class="table">
                        <tr>
                            <th>Id utilisateur</th>
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse e-mail</th>
                            <th>Téléphone</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>{{ $membres->id }}</td>
                            <td>{{ $membres->login }}</td>
                            <td>{{ $membres->nom }}</td>
                            <td>{{ $membres->prenom }}</td>
                            <td>{{ $membres->email }}</td>
                            <td>{{ $membres->tel }}</td>
                            @if(!$membres->admin)<td><a href="{{ route('supprimer', $membres->id) }}">Supprimer</a>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                    </table>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')