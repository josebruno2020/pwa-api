<?php

namespace App\Services;

use App\Models\Patient;
use Facade\FlareClient\Http\Exceptions\NotFound;

class PatientService
{

    public function getAllPatients(): array
    {
        return Patient::query()->orderByDesc('id')->get()->toArray();
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
}
