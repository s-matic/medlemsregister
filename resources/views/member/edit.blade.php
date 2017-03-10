@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/gridforms.css') }}">
    <style>
        label {
            font-weight: 500;
        }
        @media print
        {
            .grid-form [data-row-span] [data-field-span] { padding: 3px; }/*padding default 8px*/
            .no-print, .no-print *
            {
                display: none !important;
            }
            .panel
            {
                border: none;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading hidden-print">Redigera medlem</div>

                    <div class="panel-body">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Coat_of_arms_of_Serbia.svg/710px-Coat_of_arms_of_Serbia.svg.png" alt="" style="height: 100px; width: 100px;" class="img-responsive center-block">
                        <form class="grid-form" method="POST" action="{{ url('member/'.$member->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <fieldset style="margin-top: 5px;">
                                <legend style="text-align: center; ">Srpsko Udruzenje Solna</legend>
                                <div data-row-span="2">
                                    <div data-field-span="1" style="">
                                        @if ($errors->has('first_name'))
                                            <label style="color: red;">Förnamn <br>({{ $errors->first('first_name') }})</label>
                                        @else
                                            <label>Förnamn</label>
                                        @endif
                                        <input type="text" name="first_name" value="{{ $member->first_name }}" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('last_name'))
                                            <label style="color: red;">Efternamn <br>({{ $errors->first('last_name') }})</label>
                                        @else
                                            <label>Efternamn</label>
                                        @endif
                                        <input type="text" name="last_name" value="{{ $member->last_name }}" required>
                                    </div>
                                </div>
                                <div data-row-span="1">
                                    <div data-field-span="1">
                                        @if ($errors->has('date_of_birth'))
                                            <label style="color: red;">Födelsedatum (ÅÅÅÅMMDD) <br>({{ $errors->first('date_of_birth') }})</label>
                                        @else
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                        @endif
                                        <input type="text" name="date_of_birth" value="{{ $member->personnummer }}" required>
                                    </div>
                                </div>
                                <div data-row-span="4">
                                    <div data-field-span="2">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Adress <br>({{ $errors->first('address') }})</label>
                                        @else
                                            <label>Adress</label>
                                        @endif
                                        <input type="text" name="address" value="{{ $member->address }}" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('postal_code'))
                                            <label style="color: red;">Postnummer <br>({{ $errors->first('postal_code') }})</label>
                                        @else
                                            <label>Postnummer</label>
                                        @endif
                                        <input type="text" name="postal_code" value="{{ $member->postal_code }}" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('city'))
                                            <label style="color: red;">Ort <br>({{ $errors->first('city') }})</label>
                                        @else
                                            <label>Ort</label>
                                        @endif
                                        <input type="text" name="city" value="{{ $member->city }}" required>
                                    </div>
                                </div>
                                <div data-row-span="3">
                                    <div data-field-span="1">
                                        @if ($errors->has('telephone'))
                                            <label style="color: red;">Telefon <br>({{ $errors->first('telephone') }})</label>
                                        @else
                                            <label>Telefon</label>
                                        @endif
                                        <input type="text" name="telephone" value="{{ $member->telephone }}" required>
                                    </div>
                                    <div data-field-span="2">
                                        @if ($errors->has('email'))
                                            <label style="color: red;">E-postadress <br>({{ $errors->first('email') }})</label>
                                        @else
                                            <label>e-postadress</label>
                                        @endif
                                        <input type="text" name="email" value="{{ $member->email }}" required>
                                    </div>
                                </div>
                                <br>
                                <fieldset>
                                    <div data-row-span="1">
                                        <div data-field-span="1" style="height: 50px;" class="">
                                            <label style="font-weight: bold; font-size: 12px;">Medlemskap</label>
                                            <label><input type="checkbox" name="membership[]" value="1" checked> Serbiska Riksförbundet i Sverige</label> &nbsp;
                                            <label><input type="checkbox" name="membership[]" value="2" checked> Kvinnoorganisationen (från 15 år)</label> &nbsp;
                                            <label><input type="checkbox" name="membership[]" value="3" checked> Serbiska Ungdomsorganisationen (7 - 30 år)</label>
                                        </div>
                                    </div>
                                    <div data-row-span="1">
                                        <div data-field-span="1" style="height: 50px;">
                                            <label>Vi är intresserade av</label>
                                            <label><input type="checkbox" name="interests[]" value="Folkdans" {{ $member->hasInterest('Folkdans') ? 'checked' : '' }}> Folkdans</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Dramatik" {{ $member->hasInterest('Dramatik') ? 'checked' : '' }}> Dramatik</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Musik" {{ $member->hasInterest('Musik') ? 'checked' : '' }}> Musik</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Karate" {{ $member->hasInterest('Karate') ? 'checked' : '' }}> Karate</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Fotboll" {{ $member->hasInterest('Fotboll') ? 'checked' : '' }}> Fotboll</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Bordtennis" {{ $member->hasInterest('Bordtennis') ? 'checked' : '' }}> Bordtennis</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Schack" {{ $member->hasInterest('Schack') ? 'checked' : '' }}> Schack</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Biljard" {{ $member->hasInterest('Biljard') ? 'checked' : '' }}> Biljard</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Styrelseuppdrag" {{ $member->hasInterest('Styrelseuppdrag') ? 'checked' : '' }}> Styrelseuppdrag</label> &nbsp;
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <small>Behandling av personuppgifter enligt Personuppgiftslagen (PUL)</small>
                        
                            <br><br>
                            <button type="submit" id="submit" name="submit" class="btn btn-success hidden-print">Skicka</button>
                            <button onclick="window.print();" class="btn btn-primary hidden-print"><i class="fa fa-print"></i> Skriv ut</button>
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