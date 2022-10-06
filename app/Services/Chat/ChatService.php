<?php

namespace App\Services\Chat;

use App\Models\ChatMessageModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatService
{
    public static function createMessage(array $data): array
    {
        $userFromId = Auth::user()->id;
        return ChatMessageModel::create([
            "user_from" => $userFromId,
            "user_to" => $data['user_to'],
            "message" => $data['message'],
            "chat_id" => $userFromId . "-" . $data['user_to'],
            'id_front' => $data['id_front'],
            'user_from_read' => true,
            'user_to_read' => false
        ])->toArray();
    }

    public static function getChatMessages(int $userToId): array
    {
        $userFromId = Auth::user()->id;
        return ChatMessageModel::whereIn('user_from', [$userFromId, $userToId])
            ->whereIn('user_to', [$userToId, $userFromId])
            ->orderBy('id')
            ->get()
            ->toArray();
    }

    public static function getTotalUnreadMessages(): array|Collection
    {
        $loggedUserId = Auth::user()->id;
        return DB::table('chat_messages')
            ->select(['user_from', DB::raw('COUNT(user_to_read) as unread')])
            ->where('user_to', $loggedUserId)
            ->where('user_to_read', false)
            ->groupBy('user_from')
            ->get();
    }

    public static function updateUnreadMessages(int $userFrom): void
    {
        $loggedUserId = Auth::user()->id;
        ChatMessageModel::whereUserTo($loggedUserId)
            ->whereUserFrom($userFrom)
            ->where('user_to_read', false)
            ->update(
                ['user_to_read' => true]
            );
    }
}
