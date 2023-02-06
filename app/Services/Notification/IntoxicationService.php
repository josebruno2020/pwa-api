<?php

namespace App\Services\Notification;

use App\Models\Notification\Intoxication;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class IntoxicationService
{
    public static function getByPatientId(int $id): array|Collection|Intoxication
    {
        return Intoxication::wherePatientId($id)->orderByDesc('id')
            ->orderByDesc('id')
            ->get(['id', 'patient_id', 'created_at', 'user_id'])
            ->toArray();
    }

    public static function getById(int $id): array
    {
        $notification = Intoxication::whereId($id)->first();

        if (!$notification) throw new NotFound('Notificação não encontrada.');

        return $notification->toArray();
    }


    public static function create(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        $data['_50'] = self::keyToString($data['_50']);
        $data['_5005'] = self::keyToString($data['_5005']);
        $data['_52'] = self::keyToString($data['_52']);
        $data['_54'] = self::keyToString($data['_54']);
        return Intoxication::create($data)->toArray();
    }

    private static function keyToString(array $data): string
    {
        if (!isset($data[0]) || $data[0] === '') {
            return '';
        }
        return implode(',', $data);
    }

    public static function updateById(int $id, array $data): array
    {

        $notification = Intoxication::whereId($id)->first();

        if (!$notification) throw new NotFound('Noficação não encontrada');

        $dataToUpdate = self::setModelToUpdate($data);
        $notification->update($dataToUpdate);

        return $notification->toArray();
    }

    private static function setModelToUpdate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        if (isset($data['_50'])) {
            $data['_50'] = self::keyToString($data['_50']);
        }

        if (isset($data['_5005'])) {
            $data['_5005'] = self::keyToString($data['_5005']);
        }

        if (isset($data['_52'])) {
            $data['_52'] = self::keyToString($data['_52']);
        }

        if (isset($data['_54'])) {
            $data['_54'] = self::keyToString($data['_54']);
        }

        return $data;
    }

    public static function deleteById(int $id): void
    {
        $notification = Intoxication::whereId($id)->first();

        if (!$notification)throw new NotFound('Notificação não encontrada');

        $notification->delete();
    }
}
