<?php

namespace App\Services\Notification;

use App\Models\Notification\AutoPersonal;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class AutoPersonalService
{
    public static function getByPatientId(int $id): array|Collection|AutoPersonal
    {
        return AutoPersonal::wherePatientId($id)->orderByDesc('id')
            ->orderByDesc('id')
            ->get(['id', 'patient_id', 'created_at', 'user_id'])
            ->toArray();
    }

    public static function getById(int $id): array
    {
        $notification = AutoPersonal::whereId($id)->first();

        if (!$notification) throw new NotFound('Notificação não encontrada');

        return $notification->toArray();
    }

    public static function create(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        $data['_39'] = self::keyToString($data['_39']);
        $data['_56'] = self::keyToString($data['_56']);
        $data['_57'] = self::keyToString($data['_57']);
        $data['_58'] = self::keyToString($data['_58']);
        $data['_59'] = self::keyToString($data['_59']);
        $data['_61'] = self::keyToString($data['_61']);
        $data['_65'] = self::keyToString($data['_65']);

//        dd($data);
        return AutoPersonal::create($data)->toArray();
    }

    private static function keyToString(array $data): string
    {
        return implode(',', $data);
    }

    public static function updateById(int $id, array $data): array
    {
        $notification = AutoPersonal::whereId($id)->first();

        if (!$notification)throw new NotFound('Notificação não encontrada');

        $dataToUpdate = self::setModelToUpdate($data);

        $notification->update($dataToUpdate);

        return $notification->toArray();
    }

    private static function setModelToUpdate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        if (isset($data['_39'])) {
            $data['_39'] = self::keyToString($data['_39']);
        }
        if (isset($data['_56'])) {
            $data['_56'] = self::keyToString($data['_56']);
        }

        if (isset($data['_57'])) {
            $data['_57'] = self::keyToString($data['_57']);
        }

        if (isset($data['_58'])) {
            $data['_58'] = self::keyToString($data['_58']);
        }

        if (isset($data['_59'])) {
            $data['_59'] = self::keyToString($data['_59']);
        }

        if (isset($data['_61'])) {
            $data['_61'] = self::keyToString($data['_61']);
        }

        if (isset($data['_65'])) {
            $data['_65'] = self::keyToString($data['_65']);
        }


        return $data;
    }

    public static function deleteById(int $id): void
    {
        $notification = AutoPersonal::whereId($id)->first();

        if (!$notification)throw new NotFound('Notificação não encontrada');

        $notification->delete();
    }
}
