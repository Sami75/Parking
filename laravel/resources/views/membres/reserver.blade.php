@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Réservation</div>

                <div class="panel-body">
            		<div class="panel-body text-center">
            			<a href="{{ route('sendplace', $membre->id)"><button type="button" class="btn btn-default btn-sm">Réserver</button></a>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection