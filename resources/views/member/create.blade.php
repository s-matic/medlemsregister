@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/gridforms.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading">Registrera ny medlem</div>

                    <div class="panel-body">
                        <form class="grid-form" method="POST" action="{{ url('member') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Personuppgifter</legend>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        @if ($errors->has('first_name'))
                                            <label style="color: red;">Förnamn <br>({{ $errors->first('first_name') }})</label>
                                        @else
                                            <label>Förnamn</label>
                                        @endif
                                        <input type="text" name="first_name" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('first_name'))
                                            <label style="color: red;">Efternamn <br>({{ $errors->first('last_name') }})</label>
                                        @else
                                            <label>Efternamn</label>
                                        @endif
                                        <input type="text" name="last_name" required>
                                    </div>
                                </div>
                                <div data-row-span="1">
                                    <div data-field-span="1">
                                        @if ($errors->has('date_of_birth'))
                                            <label style="color: red;">Födelsedatum (ÅÅÅÅMMDD) <br>({{ $errors->first('date_of_birth') }})</label>
                                        @else
                                            <label>Födelsedatum (ÅÅÅÅMMDD)</label>
                                        @endif
                                        <input type="text" name="date_of_birth" required>
                                    </div>
                                </div>
                                <div data-row-span="4">
                                    <div data-field-span="2">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Adress <br>({{ $errors->first('address') }})</label>
                                        @else
                                            <label>Adress</label>
                                        @endif
                                        <input type="text" name="address" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Postnummer <br>({{ $errors->first('postal_code') }})</label>
                                        @else
                                            <label>Postnummer</label>
                                        @endif
                                        <input type="text" name="postal_code" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Ort <br>({{ $errors->first('city') }})</label>
                                        @else
                                            <label>City</label>
                                        @endif
                                        <input type="text" name="city" required>
                                    </div>
                                </div>
                            </fieldset>
                            <br><br>
                            <fieldset>
                                <legend>Kontaktuppgifter</legend>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Telefon <br>({{ $errors->first('telephone') }})</label>
                                        @else
                                            <label>Telefon</label>
                                        @endif
                                        <input type="text" name="telephone">
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">E-postadress <br>({{ $errors->first('email') }})</label>
                                        @else
                                            <label>postadress</label>
                                        @endif
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </fieldset>
                            <br><br>
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Skapa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script href="{{ asset('assets/js/gridforms.js') }}"></script>
@endsection