<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userModel = [
            'name' => 'Bruno',
            'email' => 'jb@teste.com',
            'birthdate' => '1997-03-12',
            'password' => 'abc123',
            'is_first_access' => true,
            'user_type' => UserTypeEnum::ADMIN,
            'number_category' => '123'
        ];

        User::create($userModel);
    }
}
