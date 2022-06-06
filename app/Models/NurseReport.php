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
 * @property string $report
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NurseReport whereId($value)
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
        'report'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
