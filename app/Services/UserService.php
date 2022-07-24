<?php

namespace App\Services;

use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpFoundation\Response;

class UserService
{

    public function getAllUsers(): array
    {
        return User::query()->orderBy('id', 'desc')->get()->toArray();
    }

    public function createUser(array $data): array
    {
        return User::create($data)->toArray();
    }

    public function getUserById(int $id): array
    {
        $user = User::find($id);

        if (!$user) throw new NotFound("User not found", Response::HTTP_NOT_FOUND);

        return $user->toArray();
    }

    public function updateUser(array $data, int $id): array
    {
        $user = User::find($id);

        if (!$user) throw new NotFound("User not found", Response::HTTP_NOT_FOUND);

        $user->update($data);

        return $user->toArray();
    }


    public function deleteUser(): void
    {
    // TODO delete users
    }
}
