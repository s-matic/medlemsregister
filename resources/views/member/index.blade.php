@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading">Registrerade medlemmar</div>

                    <div class="panel-body">

                    @if(!$members->isEmpty())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Förnamn</th>
                                    <th>Efternamn</th>
                                    <th>Födelsedatum</th>
                                    <th>Adress</th>
                                    <th>Postnummer</th>
                                    <th>Ort</th>
                                    <th>Telefon</th>
                                    <th>E-postadress</th>
                                    <th class="text-center">Åtgärd</th>
                                </tr>
                                </thead>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->number }}</td>
                                        <td>{{ $member->first_name }}</td>
                                        <td>{{ $member->last_name }}</td>
                                        <td>{{ $member->date_of_birth }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->postal_code }}</td>
                                        <td>{{ $member->city }}</td>
                                        <td>{{ $member->telephone }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td class="text-center">
                                            <a class='btn btn-info btn-xs' href="{{ url("member/$member->id/edit") }}"><span class="glyphicon glyphicon-edit"></span> Redigera</a>
                                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Ta bort</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p class="text-center"><em>Det finns inga medlemmar att visa.</em></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
