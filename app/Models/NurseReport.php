<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\NurseReport
 *
 * @property int $id
 * @property int $user_id
 * @property int $patient_id
 * @property string $report
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereUserId($value)
 * @mixin \Eloquent
 */
class NurseReport extends Model
{
    use HasFactory;
    protected $table = 'nurse_reports';
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
            'patient_id' => $this->patient_id,
            'user' => $this->user,
            'report' => $this->report,
            'created_at' => $this->created_at
        ];
    }
}
