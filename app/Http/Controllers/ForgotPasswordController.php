<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request)
    {
        $email = $request->email;

        $emailExists = User::whereEmail($email)->exists();
        if (!$emailExists) {
            throw new NotFound('Usuário não encontrado');
        }

        $token = Str::random(64);

        DB::table('password_resets')->where(['email'=> $email])->delete();

        DB::table('password_resets')->insert(
            ['email' => $email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::to($email)->queue(new ForgotPasswordMail($token, $email));

        return $this->sendData(true);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string'
        ]);

        $email = $request->email;

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $email, 'token' => $request->token])
            ->first();

        if(!$updatePassword)
            throw new ServiceException('Token Inválido', 403);

        User::whereEmail($email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $email])->delete();

        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
