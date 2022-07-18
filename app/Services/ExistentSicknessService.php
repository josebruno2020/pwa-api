<?php

namespace App\Services;

use App\Models\ExistentSickness;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpFoundation\Response;

class ExistentSicknessService
{
    public function createSickness(array $data): array
    {
        $sickness = ExistentSickness::create($this->makeSicknessModel($data));
        return $sickness->toArray();
    }

    private function makeSicknessModel(array $data): array
    {
        $sickness = null;
        if ($data['sickness']) {
            $sickness = count($data['sickness']) > 0 ? implode(',', $data['sickness']) : null;
        }

        return [
            'patient_id' => $data['patient_id'],
            'sickness' => $sickness,
            'others' => $data['others'] ?? null
        ];
    }


    public function findByPatient(int $patientId): array
    {
        $sickness = ExistentSickness::query()
            ->where('patient_id', $patientId)
            ->orderByDesc('created_at')->first();

        if (!$sickness) throw new NotFound('Doença pre-existente não encontrada', Response::HTTP_NOT_FOUND);

        return $sickness->toArray();
    }
}
