<?php

namespace App\Services;

use App\Enums\PatientStatusEnum;
use App\Models\Patient;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PatientService
{
    private PatientStatusHistoryService $historyService;

    public function __construct(PatientStatusHistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function getAllPatientsByStatus(int  $patientStatus = PatientStatusEnum::OBSERVATION,
                                           ?int $page = 1,
                                           ?int $size = 10
    ): array|Collection
    {
        $data = Patient::query()
            ->where('status', $patientStatus)
            ->orderByDesc('id')
            ->paginate(perPage: $size, page: $page);

        return new Collection($data);


    }

    public function searchPatientsPaginated(string $search, int $page, int $size, int $status = PatientStatusEnum::OBSERVATION): array|Collection
    {
        $data = Patient::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('name_mother', 'like', "%$search%");
            })
            ->where('status', $status)
            ->orderByDesc('id')
            ->paginate(perPage: $size, page: $page);

        return new Collection($data);
    }

    public function searchPatients(string $search): array
    {
       return Patient::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('name_mother', 'like', "%$search%");
            })
            ->whereNotIn('status', [PatientStatusEnum::OBSERVATION, PatientStatusEnum::DIED])
            ->orderByDesc('id')
            ->get()
           ->toArray();
    }

    public function createPatient(array $data): array
    {
        $data['created_by'] = auth()->user()->id;

        return Patient::create($data)->toArray();
    }

    public function updatePatient(int $id, array $data, bool $isPatientChossed): array
    {
        $patient = Patient::whereId($id)->first();

        if (!$patient) throw new NotFound("Patient not found", 404);

        DB::beginTransaction();

        if ($patient->status !== PatientStatusEnum::OBSERVATION && $isPatientChossed) {
            $changeStatusData = [
                'patient_id' => $patient->id,
                'status_to' => PatientStatusEnum::OBSERVATION,
                'status_from' => $patient->status
            ];

            $this->historyService->createStatusHistory($changeStatusData);
        }

        $patient->update($data);

        DB::commit();
        return $patient->toArray();
    }


    public function getPatientById(int $id): array
    {
        $patient = Patient::find($id);

        if (!$patient) throw new NotFound("Patient not found", 404);

        return $patient->toArray();
    }

    public function deletePatient(int $id): void
    {
        $patient = Patient::whereId($id)->first();

        if (!$patient) throw new NotFound("Patient not found", 404);

        DB::beginTransaction();

        $patient->doctorReports()->delete();
        $patient->nurseReports()->delete();
        $patient->existentSicknesses()->delete();
        $patient->vitalSigns()->delete();
        $patient->statusHistory()->delete();
        $patient->autoPersonalsNotification()->delete();
        $patient->intoxicationNotifications()->delete();
        $patient->evolutions()->delete();
        $patient->conducts()->delete();
        $patient->delete();

        DB::commit();

    }
}
