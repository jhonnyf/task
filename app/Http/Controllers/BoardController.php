<?php

namespace App\Http\Controllers;

class BoardController extends Controller
{

    public function index()
    {
        return view('board.index');
    }

    public function create()
    {
        $data = [];

        $response = [
            'error'   => false,
            'message' => 'Ação realizada com sucesso!',
            'result'  => [
                'html' => view('board.modal.create', $data)->render(),
            ],
        ];

        return response()->json($response);
    }
}
