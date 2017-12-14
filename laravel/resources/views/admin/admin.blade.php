@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Administrateur</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté(e) !

                    <ul id="nav">

                        <li><a href="editmembre" title="Editer la liste des membres">Editer les membres</a></li>
                        <li><a href="editplace" title="Editer la liste des places">Editer les places de parkings</a></li>
                        <li><a href="ajoutplace" title="Attribuer une place manuellement">Attribuer une place à un utilisateur</a></li>
                        <li><a href="rangmembre" title="Consulter la liste d'attente">File d'attente</a></li>
                        <li><a href="historiqueplace" title="Consulter la liste d'attribution des places">Historique</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection