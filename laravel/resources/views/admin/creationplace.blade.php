@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des places de parking</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('added') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="method" value="PUT">


                        <div class="form-group{{ $errors->has('nbplace') ? ' has-error' : '' }}">
                            <label for="nbplace" class="col-md-4 control-label">Combien de place souhaitez-vous ajouter</label>
                                <div class="col-md-6">
                                    <input id="nbplace" type="nbplace" class="form-control" name="nbplace" required>

                                    @if ($errors->has('nbplace'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nbplace') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-default btn-sm" value="Submit Button">Créer</button>
                            <a href="{{ route('editplace') }}">
                                <button type="button" class="btn btn-default btn-sm">Annuler</button>
                            </a>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')