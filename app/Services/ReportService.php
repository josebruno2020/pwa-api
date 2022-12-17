<?php

namespace App\Services;

use App\Exceptions\ServiceException;
use App\Models\Conduct;
use App\Models\DoctorReport;
use App\Models\NurseEvolution;
use App\Models\NurseReport;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;

class ReportService
{
    public function createReport(array $data, string $type = 'nurse' | 'doctor' | 'evolution' | 'conduct'): array
    {
        $model = $this->setModel($type);
        $data['user_id'] = Auth::user()->id;
        return $model::create($data)->toArray();
    }


    public function getByPatient(int $patientId, string $type = 'nurse' | 'doctor' | 'evolution' | 'conduct'): array
    {
        $model = $this->setModel($type);
        return $model::wherePatientId($patientId)
            ->orderByDesc('created_at')
            ->get()->toArray();
    }

    public function updateReport(int $id, array $data,  string $type = 'nurse' | 'doctor' | 'evolution' | 'conduct'): array
    {
        $model = $this->setModel($type);
        $report = $model::whereId($id)->first();
        if (!$report) throw new NotFound('Relatório não encontrado');

        if ($report->user_id !== Auth::user()->id) {
            throw new ServiceException('Apenas o autor pode editar um relatório');
        }

        $report->update($data);

        return $report->toArray();
    }

    public function deleteReport(int $id, string $type = 'nurse' | 'doctor' | 'evolution' | 'conduct'): void
    {
        $model = $this->setModel($type);
        $report = $model::whereId($id)->first();

        if (!$report) throw new NotFound('Relatório não encontrado');

        if ($report->user_id !== Auth::user()->id) {
            throw new ServiceException('Apenas o autor pode excluir um relatório');
        }

        $report->delete();
    }


    private function setModel(string $type = 'nurse' | 'doctor' | 'evolution' | 'conduct'): NurseReport|DoctorReport|NurseEvolution|Conduct
    {
        return match ($type) {
            'nurse' => new NurseReport(),
            'doctor' => new DoctorReport(),
            'evolution' => new NurseEvolution(),
            'conduct' => new Conduct(),
        };
    }
}
