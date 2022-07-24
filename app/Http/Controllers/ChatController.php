<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers(): JsonResponse
    {
        $users = User::query()->where('id', '<>', Auth::user()->id)->get();
        return $this->sendData($users);
    }

    public function sendMessage(Request $request): JsonResponse|bool
    {
        $message = [
            "user" => Auth::user(),
            "id" => $request->get('userId'),
            "targetUserId" => $request->get('userId'),
            "fromUserId" => Auth::user()->id,
            "fromName" => Auth::user()->name,
            "message" => $request->get('message'),


            "chatId" => Auth::user()->id."-".$request->get('userId'),
            "created_at" => Carbon::now()
        ];
        broadcast(new ChatMessage($message))->toOthers();
        return $this->sendData($message);
    }
}
