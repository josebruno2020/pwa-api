<?php

namespace App\Services;

use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class UserService
{

    public function getPaginatedUsers(?int $page = 1, ?int $size = 10): array|Collection
    {
        $data =  User::query()->orderByDesc('id')
            ->paginate(perPage: $size, page: $page);

        return new Collection($data);
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
