<?php

namespace App\Services;

use App\Exceptions\ServiceException;
use App\Models\VitalSign;
use Facade\FlareClient\Http\Exceptions\NotFound;
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

    public function updateVitalSigns(int $id, array $data): array
    {
        $vitalSign = VitalSign::whereId($id)->first();

        if (!$vitalSign) throw new NotFound('Sinal Vital não encontrado');

        $vitalSign->update($data);

        return $vitalSign->toArray();
    }

    public function deleteVitalSigns(int $id): void
    {
        $vitalSign = VitalSign::whereId($id)->first();

        if (!$vitalSign) throw new NotFound('Sinal Vital não encontrado');

        if ($vitalSign->user_id !== Auth::user()->id) {
            throw new ServiceException('Apenas o autor pode deletar');
        }

        $vitalSign->delete();
    }
}
