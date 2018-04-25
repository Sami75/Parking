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
                    <div class="list-group">
                            <a href="editmembre" class="list-group-item" title="Editer la liste des membres">Editer les membres</a>
                            <a href="editplace" class="list-group-item" title="Editer la liste des places">Editer les places de parkings</a>
                            <a href="ajoutplace" class="list-group-item" title="Attribuer une place manuellement">Attribuer une place à un utilisateur</a>
                            <a href="listeattente" class="list-group-item" title="Consulter la liste d'attente">File d'attente</a></li>
                            <a href="historiqueplace" class="list-group-item" title="Consulter la liste d'attribution des places">Historique</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection