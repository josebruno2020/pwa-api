<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PatientStatusHistory
 *
 * @property int $id
 * @property int $patient_id
 * @property int $status_from
 * @property int|null $status_to
 * @property string|null $companion
 * @property string|null $relationship
 * @property string|null $obs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $destiny
 * @property int $is_alta
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereCompanion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereDestiny($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereIsAlta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereObs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereStatusFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereStatusTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientStatusHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PatientStatusHistory extends Model
{
    use HasFactory;
    protected $table = 'patient_statuses';
    protected $fillable = [
        'patient_id',
        'status_from',
        'destiny',
        'is_alta',
        'companion',
        'relationship',
        'obs'
    ];


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
