@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Ange organisationsuppgifter</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ url('setup/organization') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <p>Namn</p>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <p>Adress</p>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                <p>Postnummer</p>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control">
                                @if ($errors->has('postal_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <p>Ort</p>
                                <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <p>E-postadress</p>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Spara</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
