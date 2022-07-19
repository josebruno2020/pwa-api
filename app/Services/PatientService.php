<?php

namespace App\Services;

use App\Enums\PatientStatusEnum;
use App\Models\Patient;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\DB;

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

    public function deletePatient(int $id): void
    {
        $patient = Patient::whereId($id)->first();

        if(!$patient) throw new NotFound("Patient not found", 404);

        DB::beginTransaction();

        $patient->doctorReports()->delete();
        $patient->nurseReports()->delete();
        $patient->existentSicknesses()->delete();
        $patient->vitalSigns()->delete();
        $patient->delete();

        DB::commit();

    }
}
