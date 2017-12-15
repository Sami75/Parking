@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des places de parkings</h3></div>

                <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th>Id place</th>
                                <th>Numéro de place</th>

                            </tr>

                            <tr>
                                    <td>{{ $place->idplace }}</td>
                                    <td>{{ $place->numplace }}</td>
                            </tr>
                        </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{ route('deleteplace', $place->idplace) }}">
                                <button type="button" class="btn btn-default btn-sm">Supprimer</button>
                            </a>
                            <a href="{{ route('editplace') }}">
                                <button type="button" class="btn btn-default btn-sm">Annuler</button>
                            </a>
                            </a>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')