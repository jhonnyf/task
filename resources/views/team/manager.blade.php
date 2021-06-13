@extends('main')

@section('content')
    <div class="container config mt-5">
        <div class="row">

            <div class="col-md-3 menu">
                <ul>
                    <li><a href="{{ route('config.index') }}">Meus dados</a></li>
                    <li><a href="{{ route('config.team') }}" class="active">Times</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="bg-white p-3">
                    <h3 class="mb-4">Gerenciador de time</h3>

                    <form action="{{ route('config.team-store', ['id' => $id]) }}" class="form-ajax mb-3" autocomplete="off">
                        <input type="text" id="time" name="team" class="form-control" value="{{ is_null($id) ? '' : $Team->team }}" placeholder="Digite aqui o nome do seu time"> 
                        <div class="text-end mt-3">
                            <button class="btn btn-dark">Salvar</button>
                        </div>
                    </form>

                    @if (is_null($id) === false)
                        <form action="{{ route('config.team-invitation', ['id' => $id]) }}" class="form-ajax" autocomplete="off">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite aqui o e-mail do seu convidado">
                            <div class="text-end mt-3">
                                <button class="btn btn-dark">Convidar</button>
                            </div>
                        </form>               

                        <table class="mt-3 table table-striped table-hover team-users">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Responsabilidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Team->users()->exists())
                                    @foreach ($Team->users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($responsibilities as $responsibility)
                                                    <a href="{{ route('config.change-responsibility', ['id'=>$Team->id, 'user_id' => $user->id, 'responsibility_id' => $responsibility['id']]) }}" class="link-ajax badge {{ $user->pivot->responsibility->id == $responsibility['id'] ? "active" : "                                                                                                                       " }}">{{ $responsibility['responsibility'] }}</a>
                                                @endforeach                                            
                                            </td>
                                            <td class="text-center actions">
                                                <a href="{{ route('config.team-remove-user', ['id' => $Team->id, 'user_id' => $user->id]) }}"><i class="fas fa-trash"></i></a>                                            
                                            </td>
                                        </tr>
                                    @endforeach                                                                           
                                @else                                            
                                    <tr>
                                        <td>Não existe nenhum usuário no seu time</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>        
                    
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endsection