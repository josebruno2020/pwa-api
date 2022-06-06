<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ExistentSickness
 *
 * @property int $id
 * @property int $patient_id
 * @property string|null $sickness
 * @property string $others
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness whereOthers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness whereSickness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExistentSickness whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExistentSickness extends Model
{
    use HasFactory;
    protected $table = 'existent_sickness';
    protected $fillable = [
        'patient_id',
        'sickness',
        'others'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
