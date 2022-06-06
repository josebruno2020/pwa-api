<?php

namespace App\Services;

use App\Enums\PatientStatusEnum;
use App\Models\Patient;
use Facade\FlareClient\Http\Exceptions\NotFound;

class PatientService
{

    public function getAllPatientsByStatus(int $patientStatus = PatientStatusEnum::OBSERVATION): array
    {
        return Patient::query()
            ->where('status', $patientStatus)
            ->orderByDesc('id')
            ->get()
            ->toArray();
    }

    public function createPatient(array $data): array
    {
        $data['created_by'] = auth()->user()->id;

        return Patient::create($data)->toArray();
    }


    public function getPatientById(int $id): array
    {
        $patient = Patient::find($id);

        if(!$patient) throw new NotFound("Patient not found", 404);

        return $patient->toArray();
    }

//    public function updateUser(int $userId, array $data): array
//    {
//
//    }
}
