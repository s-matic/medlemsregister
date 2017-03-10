@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.css"/>
    <style>
        .col-md-12{
            padding: 0;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading">Registrerade medlemmar</div>

                    <div class="panel-body">

                    @if(!$members->isEmpty())
                            <table class="table table-striped" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Förnamn</th>
                                    <th>Efternamn</th>
                                    <th>Personnummer</th>
                                    <th>Adress</th>
                                    <th>Postnummer</th>
                                    <th>Ort</th>
                                    <th>Telefon</th>
                                    <th>E-postadress</th>
                                    <th>Avgift</th>
                                    <th class="text-center">Åtgärd</th>
                                </tr>
                                </thead>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->first_name }}</td>
                                        <td>{{ $member->last_name }}</td>
                                        <td>{{ $member->personnummer }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->postal_code }}</td>
                                        <td>{{ $member->city }}</td>
                                        <td>{{ $member->telephone }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->fee ? 'Betald' : 'Obetald' }}</td>
                                        <td class="text-center">
                                            <a class='btn btn-info btn-xs' href="{{ route('member.show', [$member]) }}"><span class="glyphicon glyphicon-edit"></span> Redigera</a>
                                            {{--<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Ta bort</a></td>--}}
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
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Swedish.json"
                }
            });
        } );
    </script>
@endsection