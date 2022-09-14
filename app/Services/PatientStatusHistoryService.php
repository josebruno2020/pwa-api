<?php

namespace App\Services;

use App\Enums\PatientStatusEnum;
use App\Models\Patient;
use App\Models\PatientStatusHistory;
use Illuminate\Support\Facades\DB;

class PatientStatusHistoryService
{
    public function getByPatient(int $patientId): array
    {
        return PatientStatusHistory::wherePatientId($patientId)
            ->orderByDesc('created_at')
            ->get()->toArray();
    }

    public function createStatusHistory(array $data): array
    {
        DB::beginTransaction();
        $statusHistory = PatientStatusHistory::create($data);
        $patientStatus = PatientStatusEnum::OBSERVATION;
        if (isset($data['is_alta'])) {
            $patientStatus = PatientStatusEnum::HOME;
        }
        Patient::whereId($data['patient_id'])->update(
            ['status' => $patientStatus]
        );
        DB::commit();
        return $statusHistory->toArray();
    }
}
