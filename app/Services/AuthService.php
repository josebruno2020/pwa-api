<?php

namespace App\Services;


use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;

class AuthService
{
    public function changePassword(int $id, string $newPassword)
    {
        $user = User::find($id);
        if (!$user) throw new NotFound("User not found", 404);
        $user->password = $newPassword;
        $user->is_first_access = false;

        $user->save();
    }
}
