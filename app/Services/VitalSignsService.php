<?php

namespace App\Services;

use App\Models\VitalSign;
use Illuminate\Support\Facades\Auth;

class VitalSignsService
{
    public function createVitalSigns(array $data): array
    {
        $data['user_id'] = Auth::user()->id;

        return VitalSign::create($data)->toArray();
    }

    public function getByPatient(int $patientId): array
    {
        return VitalSign::wherePatientId($patientId)
            ->orderByDesc('created_at')
            ->get()->toArray();
    }
}
