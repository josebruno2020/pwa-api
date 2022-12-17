<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Conduct
 *
 * @property-read \App\Models\Patient|null $patient
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $patient_id
 * @property string $conduct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct whereConduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conduct whereUserId($value)
 */
class Conduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'patient_id',
        'conduct'
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
            'conduct' => $this->conduct,
            'created_at' => $this->created_at,
            'user' => $this->user
        ];
    }
}
