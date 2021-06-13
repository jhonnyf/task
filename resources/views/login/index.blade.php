@extends('layout.login')

@section('content')
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-6 bg-orange d-flex justify-content-center align-items-center">
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
                        
                        <div class="mb-2">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                        </div>
    
                        <div class="mb-2">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required>
                        </div>
    
                        <div class="text-end">
                            <button class="btn btn-dark">ENVIAR</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection