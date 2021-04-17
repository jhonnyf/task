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
                <h3 class="mb-4">Gerenciador de time</h3>

                <form action="{{ route('config.team-store', ['id' => $id]) }}" class="form-ajax mb-3">
                    <input type="text" id="time" name="team" class="input" value="{{ is_null($id) ? '' : $Team->team }}" placeholder="Digite aqui o nome do seu time"> 
                    <div class="text-right mt-3 2">
                        <button class="btn">Salvar</button>
                    </div>
                </form>

                @if (is_null($id) === false)
                    <form action="{{ route('config.team-invitation', ['id' => $id]) }}" class="form-ajax">
                        <input type="email" name="email" id="email" class="input" placeholder="Digite aqui o e-mail do seu convidado">
                        <div class="text-right mt-3 2">
                            <button class="btn">Convidar</button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>    
@endsection