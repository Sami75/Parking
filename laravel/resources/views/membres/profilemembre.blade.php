@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body text-center">
                	<ul id="nav">

                        <li><a href="editprofile" title="Modifier ses informations">Modifier ses informations</a></li>
                        <li><a href="editpwdmembre" title="Modifier son mot de passe">Modifier son mot de passe</a></li>
                    
                    </ul>

                            <table class="table-hover">
                        <tr>
                            <th class="col-md-2">Nom d'utilisateur</th>
                            <th class="col-md-2">Nom</th>
                            <th class="col-md-2">Prenom</th>
                            <th class="col-md-2">Adresse e-mail</th>
                            <th class="col-md-2">Téléphone</th>

                        </tr>
                        <tr>
                            <td >{{ Auth::User()->login }}</td>
                            <td >{{ Auth::User()->nom }}</td>
                            <td >{{ Auth::User()->prenom }}</td>
                            <td >{{ Auth::User()->email }}</td>
                            <td >{{ Auth::User()->tel }}</td>
                        </tr>  
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')