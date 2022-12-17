<?php

namespace App\Models;

use App\Models\Notification\AutoPersonal;
use App\Models\Notification\Intoxication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Patient
 *
 * @property int $id
 * @property int $created_by
 * @property string $name
 * @property string $birthdate
 * @property string $name_mother
 * @property string $cns
 * @property string|null $cpf
 * @property string|null $rg
 * @property string|null $from_city
 * @property string|null $from_state
 * @property string|null $phone_number
 * @property string|null $mobile_number
 * @property string|null $street
 * @property string|null $number
 * @property string|null $complement
 * @property string|null $neighborhood
 * @property string|null $city
 * @property string|null $state
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|AutoPersonal[] $autoPersonalsNotification
 * @property-read int|null $auto_personals_notification_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DoctorReport[] $doctorReports
 * @property-read int|null $doctor_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExistentSickness[] $existentSicknesses
 * @property-read int|null $existent_sicknesses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Intoxication[] $intoxicationNotifications
 * @property-read int|null $intoxication_notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NurseReport[] $nurseReports
 * @property-read int|null $nurse_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PatientStatusHistory[] $statusHistory
 * @property-read int|null $status_history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VitalSign[] $vitalSigns
 * @property-read int|null $vital_signs_count
 * @method static \Database\Factories\PatientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedBy($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'created_by',
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
        'state',
        'status'
    ];

    public function doctorReports(): HasMany
    {
        return $this->hasMany(DoctorReport::class);
    }

    public function nurseReports(): HasMany
    {
        return $this->hasMany(NurseReport::class);
    }

    public function vitalSigns(): HasMany
    {
        return $this->hasMany(VitalSign::class);
    }

    public function existentSicknesses(): HasMany
    {
        return $this->hasMany(ExistentSickness::class);
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(PatientStatusHistory::class);
    }

    public function autoPersonalsNotification(): HasMany
    {
        return $this->hasMany(AutoPersonal::class);
    }

    public function intoxicationNotifications(): HasMany
    {
        return $this->hasMany(Intoxication::class);
    }

    public function evolutions(): HasMany
    {
        return $this->hasMany(NurseEvolution::class);
    }

    public function conducts(): HasMany
    {
        return $this->hasMany(Conduct::class);
    }
}
