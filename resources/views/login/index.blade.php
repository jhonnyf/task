@extends('layout.login')

@section('content')
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-6 bg-gray-light d-flex justify-content-center align-items-center">
                <div class="brand">
                    TASK
                    <p class="brand-sub">Seu sistema de gerenciar tarefas</p>
                </div>
            </div>
            <div class="col-md-6 container-login justify-content-center">
                <div class="access">
                    <form action="{{ route('login.authenticate') }}" method="post" class="form" autocomplete="off">
                        @csrf

                        <p class="text">Para acessar nosso sistema, insira suas credenciais e aproveite nosso sistema!</p>
                        
                        <div class="form-field">
                            <input type="email" class="input" name="email" id="email" placeholder="E-mail" required>
                        </div>
    
                        <div class="form-field">
                            <input type="password" class="input" name="password" id="password" placeholder="Senha" required>
                        </div>
    
                        <div class="text-right">
                            <button class="btn">ENVIAR</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection