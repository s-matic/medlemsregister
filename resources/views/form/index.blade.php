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
                    <div class="panel-heading">Formulär för medlemmar</div>

                    <div class="panel-body">
                        <p>I rutan nedan finner ni en kodrad som ni kan kopiera för att bädda in formuläret på den egna webbplatsen.</p>
                        <p>formuläret är anpassat för att fungera med de flesta webbplatser som tillåter att administratören själv inkluderar kod.</p>
                        <pre>&lt;iframe src=&quot;http://www.w3schools.com&quot;&gt;&lt;/iframe&gt;</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script href="{{ asset('assets/js/gridforms.js') }}"></script>
@endsection