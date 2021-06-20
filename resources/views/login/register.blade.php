@extends('layout.login')

@section('content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-6 bg-orange d-flex justify-content-center align-items-center">
            <div class="brand">
                EndTasks
                <p class="brand-sub">Seu sistema de gerenciar tarefas</p>
            </div>
        </div>
        <div class="col-md-6 register d-flex justify-content-center align-items-center">            
            <form action="{{ route('login.store') }}" method="post" class="form" autocomplete="off">
                @if (is_null($team_id) === false)
                    <input type="hidden" name="team_id" value="{{ $team_id }}">
                @endif
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
            
                <p class="text mb-3 text-center">Para acessar nosso sistema, insira suas credenciais e aproveite nosso sistema!</p>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nome" value="{{ old('first_name') }}" required>                        
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Sobrenome" value="{{ old('last_name') }}">
                    </div>
                </div>
    
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required value="{{ isset($email) ? $email : old('email') }}" {{ isset($email) ? 'readonly' : '' }}>
                </div> 
            
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" required>
                        </div>
                    </div>
                </div>
            
                <div class="text-end">
                    <a href="{{ route('login.index') }}" class="btn">VOLTAR</a>
                    <button class="btn btn-dark">ENVIAR</button>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection