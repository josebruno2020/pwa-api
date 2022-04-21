<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Patient
 *
 * @property int $id
 * @property string $name
 * @property string $birthdate
 * @property string $name_mother
 * @property string $cns
 * @property string $cpf
 * @property string $rg
 * @property string $from_city
 * @property string $from_state
 * @property string|null $phone_number
 * @property string|null $mobile_number
 * @property string|null $street
 * @property string|null $number
 * @property string|null $complement
 * @property string|null $neighborhood
 * @property string|null $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFromCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFromState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereNameMother($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereRg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'name',
        'birthdate',
        'name_mother',
        'cns',
        'cpf',
        'rg',
        'from_city',
        'from_state',
        'phone_number',
        'mobile_number',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
    ];
}
