<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\VitalSign
 *
 * @property int $id
 * @property int $user_id
 * @property int $patient_id
 * @property string|null $blood_pressure
 * @property string|null $heart_pressure
 * @property string|null $respiratory_frequency
 * @property string|null $axiliary_temperature
 * @property string|null $sap
 * @property string|null $capillary_blood_glucose
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign query()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereAxiliaryTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereBloodPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereCapillaryBloodGlucose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereHeartPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereRespiratoryFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereSap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereUserId($value)
 * @mixin \Eloquent
 */
class VitalSign extends Model
{
    use HasFactory;
    protected $table = 'vital_signs';
    protected $fillable = [
        'user_id',
        'patient_id',
        'blood_pressure',
        'heart_pressure',
        'respiratory_frequency',
        'axiliary_temperature',
        'sap',
        'capillary_blood_glucose'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }


    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'patient_id' => $this->patient_id,
            'blood_pressure' => $this->blood_pressure,
            'heart_pressure' => $this->heart_pressure,
            'respiratory_frequency' => $this->respiratory_frequency,
            'axiliary_temperature' => $this->axiliary_temperature,
            'sap' => $this->sap,
            'capillary_blood_glucose' => $this->capillary_blood_glucose,
            'patient' => $this->patient,
            'user' => $this->user,
            'created_at' => $this->created_at
        ];
    }
}
