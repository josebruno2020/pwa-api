<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VitalSign
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign query()
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VitalSign whereUserId($value)
 * @mixin \Eloquent
 */
class VitalSign extends Model
{
    use HasFactory;
}
