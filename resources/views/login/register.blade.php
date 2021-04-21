@extends('layout.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 register d-flex justify-content-center align-items-center">
            <form action="{{ route('login.store') }}" method="post" class="form" autocomplete="off">
                @csrf
            
                <p class="text mb-3 text-center">Para acessar nosso sistema, insira suas credenciais e aproveite nosso sistema!</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="text" class="input" name="first_name" id="first_name" placeholder="Nome" required>
                        </div>                                
                    </div>
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="text" class="input" name="last_name" id="last_name" placeholder="Sobrenome" required>
                        </div>
                    </div>
                </div>
    
                <div class="form-field">
                    <input type="email" class="input" name="email" id="email" placeholder="E-mail" required>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="password" class="input" name="password" id="password" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-field">
                            <input type="password" class="input" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" required>
                        </div>
                    </div>
                </div>
            
                <div class="text-right">
                    <button class="btn">ENVIAR</button>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection