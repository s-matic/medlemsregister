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
                    <div class="panel-heading hidden-print">Registrera ny medlem</div>

                    <div class="panel-body">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Coat_of_arms_of_Serbia.svg/710px-Coat_of_arms_of_Serbia.svg.png" alt="" style="height: 100px; width: 100px;" class="img-responsive center-block">
                        <form class="grid-form" method="POST" action="{{ url('member') }}">
                            {{ csrf_field() }}
                            <fieldset style="margin-top: 5px;">
                                <legend style="text-align: center; border-bottom: none; padding-bottom: 2px; margin-bottom: 0;">Српско удружење Солна</legend>
                                <legend style="text-align: center;">Medlemsansökan för Serbiska föreningen Solna</legend>
                                <div data-row-span="4">
                                    <div data-field-span="1" style="">
                                        @if ($errors->has('first_name'))
                                            <label style="color: red;">Förnamn / име <br>({{ $errors->first('first_name') }})</label>
                                        @else
                                            <label>Förnamn / име</label>
                                        @endif
                                        <input type="text" name="first_name" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('last_name'))
                                            <label style="color: red;">Efternamn / презиме <br>({{ $errors->first('last_name') }})</label>
                                        @else
                                            <label>Efternamn / презиме</label>
                                        @endif
                                        <input type="text" name="last_name" required>
                                    </div>
                                    <div data-field-span="1">
                                        <label>Förnamn / име</label>
                                        <input type="text" name="first_name_2">
                                    </div>
                                    <div data-field-span="1">
                                        {{--@if ($errors->has('first_name'))--}}
                                            {{--<label style="color: red;">Efternamn / презиме <br>({{ $errors->first('last_name') }})</label>--}}
                                        {{--@else--}}
                                            {{--<label>Efternamn / презиме</label>--}}
                                        {{--@endif--}}
                                        <label>Efternamn / презиме</label>
                                        <input type="text" name="last_name_2">
                                    </div>
                                </div>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        @if ($errors->has('date_of_birth'))
                                            <label style="color: red;">Personnummer (ÅÅÅÅMMDDNNNN) <br>({{ $errors->first('date_of_birth') }})</label>
                                        @else
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                        @endif
                                        <input type="text" name="date_of_birth" required>
                                    </div>
                                    <div data-field-span="1">
                                        {{--@if ($errors->has('date_of_birth_2'))--}}
                                            {{--<label style="color: red;">Personnummer (ÅÅÅÅMMDDNNNN) <br>({{ $errors->first('date_of_birth_2') }})</label>--}}
                                        {{--@else--}}
                                            {{--<label>Personnummer (ÅÅÅÅMMDDNNNN)</label>--}}
                                        {{--@endif--}}
                                        <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                        <input type="text" name="date_of_birth_2">
                                    </div>
                                </div>
                                <div data-row-span="4">
                                    <div data-field-span="2">
                                        @if ($errors->has('address'))
                                            <label style="color: red;">Adress / адреса <br>({{ $errors->first('address') }})</label>
                                        @else
                                            <label>Adress / адреса</label>
                                        @endif
                                        <input type="text" name="address" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('postal_code'))
                                            <label style="color: red;">Postnummer / поштански број
 <br>({{ $errors->first('postal_code') }})</label>
                                        @else
                                            <label>Postnummer / поштански број
</label>
                                        @endif
                                        <input type="text" name="postal_code" required>
                                    </div>
                                    <div data-field-span="1">
                                        @if ($errors->has('city'))
                                            <label style="color: red;">Ort / место <br>({{ $errors->first('city') }})</label>
                                        @else
                                            <label>Ort / место</label>
                                        @endif
                                        <input type="text" name="city" required>
                                    </div>
                                </div>
                                <div data-row-span="6">
                                    <div data-field-span="1">
                                        @if ($errors->has('telephone'))
                                            <label style="color: red;">Telefon / телефон<br>({{ $errors->first('telephone') }})</label>
                                        @else
                                            <label>Telefon / телефон</label>
                                        @endif
                                        <input type="text" name="telephone" required>
                                    </div>
                                    <div data-field-span="2">
                                        @if ($errors->has('email'))
                                            <label style="color: red;">E-postadress / e-маил <br>({{ $errors->first('email') }})</label>
                                        @else
                                            <label>e-postadress / e-маил</label>
                                        @endif
                                        <input type="text" name="email" required>
                                    </div>
                                    <div data-field-span="1">
                                        {{--@if ($errors->has('address'))--}}
                                            {{--<label style="color: red;">Telefon / телефон<br>({{ $errors->first('telephone') }})</label>--}}
                                        {{--@else--}}
                                            {{--<label>Telefon / телефон</label>--}}
                                        {{--@endif--}}
                                        <label>Telefon / телефон</label>
                                        <input type="text" name="telephone_2">
                                    </div>
                                    <div data-field-span="2">
                                        {{--@if ($errors->has('address'))--}}
                                            {{--<label style="color: red;">E-postadress / e-маил <br>({{ $errors->first('email') }})</label>--}}
                                        {{--@else--}}
                                            {{--<label>e-postadress / e-маил</label>--}}
                                        {{--@endif--}}
                                        <label>e-postadress / e-маил</label>
                                        <input type="text" name="email_2">
                                    </div>
                                </div>
                                <br>
                                <fieldset>
                                    <legend>Barn / деца</legend>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Förnamn / име</label>
                                            <input type="text" name="child_first_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Efternamn / презиме</label>
                                            <input type="text" name="child_last_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                            <input type="text" name="child_date_of_birth[]">
                                        </div>
                                    </div>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Förnamn / име</label>
                                            <input type="text" name="child_first_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Efternamn / презиме</label>
                                            <input type="text" name="child_last_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                            <input type="text" name="child_date_of_birth[]">
                                        </div>
                                    </div>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Förnamn / име</label>
                                            <input type="text" name="child_first_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Efternamn / презиме</label>
                                            <input type="text" name="child_last_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                            <input type="text" name="child_date_of_birth[]">
                                        </div>
                                    </div>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Förnamn / име</label>
                                            <input type="text" name="child_first_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Efternamn / презиме</label>
                                            <input type="text" name="child_last_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                            <input type="text" name="child_date_of_birth[]">
                                        </div>
                                    </div>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Förnamn / име</label>
                                            <input type="text" name="child_first_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Efternamn / презиме</label>
                                            <input type="text" name="child_last_name[]">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Personnummer (ÅÅÅÅMMDDNNNN)</label>
                                            <input type="text" name="child_date_of_birth[]">
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <div data-row-span="1">
                                        <div data-field-span="1" style="height: 50px;" class="">
                                            <label style="font-weight: bold; font-size: 12px;">Vi önskar bli medlemmar i / Želimo da budemo članovi</label>
                                            <label><input type="checkbox" name="membership[]" value="1" checked> Serbiska Riksförbundet i Sverige</label> &nbsp;
                                            <label><input type="checkbox" name="membership[]" value="2" checked> Kvinnoorganisationen (från 15 år)</label> &nbsp;
                                            <label><input type="checkbox" name="membership[]" value="3" checked> Serbiska Ungdomsorganisationen (7 - 30 år)</label>
                                        </div>
                                    </div>
                                    <div data-row-span="1">
                                        <div data-field-span="1" style="height: 50px;">
                                            <label>Vi är intresserade av / Ми смо заинтересовани за</label>
                                            <label><input type="checkbox" name="interests[]" value="Folkdans"> Folkdans</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Dramatik"> Dramatik</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Musik"> Musik</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Karate"> Karate</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Fotboll"> Fotboll</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Bordtennis"> Bordtennis</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Schack"> Schack</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Biljard"> Biljard</label> &nbsp;
                                            <label><input type="checkbox" name="interests[]" value="Styrelseuppdrag"> Styrelseuppdrag</label> &nbsp;
                                        </div>
                                    </div>
                                     <div data-row-span="1">
                                        <div data-field-span="1" style="height: 50px;">
                                        
                                            <label>Övrigt intresse / Други интерес</label>
                                            <input type="text">
                                                                                    
                                        </div>
                                    </div>
                                    <div data-row-span="3">
                                        <div data-field-span="1">
                                            <label>Ort / место</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Datum / датум</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Underskrift / потпис</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                 <fieldset>
                                    <legend>Avgifter</legend>
                                    <div data-row-span="4">                             
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>       
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div data-row-span="4">                             
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>                            
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div data-row-span="4">                             
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>                            
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div data-row-span="4">                             
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>                          
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>
                                    </div> 
                                    <div data-row-span="4">                             
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
                                        </div>                          
                                        <div data-field-span="1">
                                            <label>År</label>
                                            <input type="text">
                                        </div>
                                        <div data-field-span="1">
                                            <label>Betald</label>
                                            <input type="text">
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