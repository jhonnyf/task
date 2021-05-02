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

                <div class="d-flex justify-content-between align-items-center">
                    <p>Gerencie aqui os seus times</p>
                    <p class="text-right"><a href="{{ route('config.team-manager') }}" class="btn"><i class="fas fa-plus"></i> Novo time</a></p>
                </div>

                <p class="mt-3 mb-3 text-right">Você tem um total de {{ $User->teams()->count() }} times</p>

                <div class="teams">
                    @foreach ($User->teams as $team)
                        <div class="team">
                            <a href="{{ route('config.team-manager', ['id' => $team->id]) }}">{{ $team->team }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
@endsection