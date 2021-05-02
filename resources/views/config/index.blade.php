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
                <h3 class="mb-4">Meus dados</h3>

                <form action="{{ route('config.my-data-save') }}" method="post" class="form">
                    @csrf

                    @if(Session::has('success'))
                        <div class="alert alert-success mb-3">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())                            
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach                        
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="input" readonly value="{{ $User->email }}" placeholder="E-mail">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Nome</label>
                                <input type="text" name="first_name" id="first_name" class="input" value="{{ $User->first_name }}" placeholder="Nome">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Sobrenome</label>
                                <input type="text" name="last_name" id="last_name" class="input" value="{{ $User->last_name }}" placeholder="Sobrenome">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="input" placeholder="Senha">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme seu senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirme seu senha">
                    </div>

                    <div class="text-right">
                        <button class="btn">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endsection