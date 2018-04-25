@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3>Edition de la liste des membres</h3>
                	@if($nbValider > 0)
                    	<a href="{{ route('validermembre')}}">
                    		<button type="button" class="btn btn-primary active" style="float: right;">Nouveau(x) compte(s) <span class="badge badge-light">{{$nbValider}}</span></button>
                    	</a>           
                    @else
                    	<a href="{{ route('validermembre')}}">
                    		<button type="button" class="btn btn-primary disabled" style="float: right;">Nouveau(x) compte(s) <span class="badge badge-light">{{$nbValider}}</span></button>
                    	</a>
                    @endif

                </div>

                <div class="panel-body text-center">

                    <table class="table table-stripped">
                    	<thead>
	                            <th class="text-center">Id utilisateur</th>
	                            <th class="text-center">Nom d'utilisateur</th>
	                            <th class="text-center">Nom</th>
	                            <th class="text-center">Prenom</th>
	                            <th class="text-center">Adresse e-mail</th>
	                            <th class="text-center">Téléphone</th>
	                            <th class="text-center">Rang</th>
	                            <th class="text-center">Sélectionner</th>
	                    </thead>
	                    <tbody>
	                        @foreach($membres as $membre)
	                        <tr>
	                            <td>{{ $membre->id }}</td>
	                            <td>{{ $membre->login }}</td>
	                            <td>{{ $membre->nom }}</td>
	                            <td>{{ $membre->prenom }}</td>
	                            <td>{{ $membre->email }}</td>
	                            <td>{{ $membre->tel }}</td>
	                            <td>{{ $membre->rang }}</td>
	                            @if(!$membre->admin)
	                            <td >
	                                <a href="{{ route('selection', $membre->id) }}"><button type="button" class="btn btn-default btn-sm">Sélectionner</button></a>
	                            </td>
	                            @else
	                            <td></td>
	                            @endif
	                        </tr>
	                        @endforeach
	                    </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')