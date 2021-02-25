@extends('main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="board-detail">
                    
                    <h2>{{ $Board->board }}</h2>
                    
                    <div class="columns">
                        <div class="column">
                            <div class="card"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection