<?php

namespace App\Http\Controllers;

use App\Events\Chat;
use App\Http\Requests\ChatMessageRequest;
use App\Models\ChatMessageModel;
use App\Models\User;
use App\Services\Chat\ChatService;
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

    public function sendMessage(ChatMessageRequest $request): JsonResponse|bool
    {
        $chatMessage = ChatService::createMessage($request->validated());
        broadcast(new Chat($chatMessage))->toOthers();
        return $this->sendData($chatMessage);
    }

    public function getChatMessages(Request $request): JsonResponse
    {
        $userTo = $request->get('user_to');
        $page = $request->get('page', 1);
        $messages = ChatService::getChatMessages($userTo, $page);
        return $this->sendData($messages);
    }

    public function getUnreadMessages(): JsonResponse
    {
        $unreadMessages = ChatService::getTotalUnreadMessages();
        return $this->sendData($unreadMessages);
    }

    public function updateUnread(Request $request): JsonResponse
    {
        $userFrom = $request->get('user_from');
        ChatService::updateUnreadMessages($userFrom);
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
