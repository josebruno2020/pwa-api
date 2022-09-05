<?php

namespace App\Services\Notification;

use App\Models\Notification\AutoPersonal;
use App\Models\Notification\Intoxication;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class IntoxicationService
{
    public static function getByPatientId(int $id): array|Collection|Intoxication
    {
        return Intoxication::wherePatientId($id)->orderByDesc('id')->first() ?? [];
    }


    public static function create(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
//        $data['_39'] = self::keyToString($data['_39']);
//        $data['_56'] = self::keyToString($data['_56']);
//        $data['_57'] = self::keyToString($data['_57']);
//        $data['_58'] = self::keyToString($data['_58']);
//        $data['_59'] = self::keyToString($data['_59']);
//        $data['_61'] = self::keyToString($data['_61']);
//        $data['_65'] = self::keyToString($data['_65']);

//        dd($data);
        return AutoPersonal::create($data)->toArray();
    }

    private static function keyToString(array $data): string
    {
        return implode(',', $data);
    }
}
