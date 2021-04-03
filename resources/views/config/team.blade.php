@extends('main')

@section('content')
    <div class="container config-section">
        <div class="row">
            <div class="col-md-3 menu">
                <ul>
                    <li><a href="{{ route('config.index') }}">Meus dados</a></li>
                    <li><a href="{{ route('config.team') }}">Times</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h3 class="mb-4">Times</h3>

                <p>Monte aqui os seus times</p>
            </div>
        </div>
    </div>    
@endsection