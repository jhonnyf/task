<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'password'   => Hash::make('123123'),
            'email'      => 'root@task.com.br',
            'first_name' => 'Root',
            'last_name'  => 'Task',
        ];

        User::create($data);
    }
}
