<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChatMessageModel
 *
 * @property int $id
 * @property string $chat_id
 * @property string $message
 * @property int $user_from
 * @property int $user_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereUserFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereUserTo($value)
 * @mixin \Eloquent
 * @property string $id_front
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereIdFront($value)
 * @property int $user_from_read
 * @property int $user_to_read
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereUserFromRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessageModel whereUserToRead($value)
 */
class ChatMessageModel extends Model
{
    use HasFactory;
    protected $table = 'chat_messages';
    protected $fillable = [
        'chat_id',
        'message',
        'user_from',
        'user_to',
        'id_front',
        'user_from_read',
        'user_to_read'
    ];

    /**
     * @return array
     *
     */
    public function toArray()
    {
        return [
            "id" => $this->id,
            "chat_id" => $this->chat_id,
            "message" => $this->message,
            "user_from" => User::whereId($this->user_from)->first()->toArray(),
            "user_to" => User::whereId($this->user_to)->first()->toArray(),
            "id_front" => $this->id_front,
            "created_at" => $this->created_at
        ];
    }


}
