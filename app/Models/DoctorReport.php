<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\DoctorReport
 *
 * @property int $id
 * @property int $user_id
 * @property int $patient_id
 * @property string $report
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport whereReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorReport whereUserId($value)
 * @mixin \Eloquent
 */
class DoctorReport extends Model
{
    use HasFactory;
    protected $table = 'doctor_reports';
    protected $fillable = [
        'user_id',
        'patient_id',
        'report'
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'patient_id' => $this->patient_id,
            'report' => $this->report,
            'created_at' => $this->created_at,
            'user' => $this->user
        ];
    }
}
