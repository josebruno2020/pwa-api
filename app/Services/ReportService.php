<?php

namespace App\Services;

use App\Models\DoctorReport;
use App\Models\NurseReport;
use Illuminate\Support\Facades\Auth;

class ReportService
{
    public function createReport(array $data, string $type = 'nurse' | 'doctor'): array
    {
        $model = $this->setModel($type);
        $data['user_id'] = Auth::user()->id;
        return $model::create($data)->toArray();
    }


    public function getByPatient(int $patientId, string $type = 'nurse' | 'doctor'): array
    {
        $model = $this->setModel($type);
        return $model::wherePatientId($patientId)
            ->orderByDesc('created_at')
            ->get()->toArray();
    }


    private function setModel(string $type = 'nurse' | 'doctor'): NurseReport|DoctorReport
    {
        return match ($type) {
            'nurse' => new NurseReport(),
            'doctor' => new DoctorReport()
        };
    }
}
