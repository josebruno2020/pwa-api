<?php

namespace App\Services;

use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;

class UserService
{

    public function getAllUsers(): array
    {
        return User::query()->orderBy('id', 'DESC')->get()->toArray();
    }

    public function createUser(array $data): array
    {
        return User::create($data)->toArray();
    }

    public function getUserById(int $id): array
    {
        $user = User::find($id);

        if (!$user) throw new NotFound("User not found", 404);

        return $user->toArray();
    }
}
