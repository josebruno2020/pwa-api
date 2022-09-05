<?php

namespace App\Models\Notification;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Notification\AutoPersonal
 *
 * @property int $id
 * @property int $patient_id
 * @property int $user_id
 * @property string|null $_01
 * @property string|null $_02
 * @property string|null $_03
 * @property string|null $_04
 * @property string|null $_05
 * @property string|null $_0505
 * @property string|null $_06
 * @property string|null $_07
 * @property string|null $_0705
 * @property string|null $_08
 * @property string|null $_0805
 * @property string|null $_09
 * @property string|null $_10
 * @property string|null $_11
 * @property string|null $_12
 * @property string|null $_1205
 * @property string|null $_13
 * @property string|null $_14
 * @property string|null $_15
 * @property string|null $_16
 * @property string|null $_17
 * @property string|null $_18
 * @property string|null $_19
 * @property string|null $_20
 * @property string|null $_2005
 * @property string|null $_21
 * @property string|null $_22
 * @property string|null $_23
 * @property string|null $_2305
 * @property string|null $_24
 * @property string|null $_25
 * @property string|null $_26
 * @property string|null $_27
 * @property string|null $_28
 * @property string|null $_29
 * @property string|null $_30
 * @property string|null $_31
 * @property string|null $_32
 * @property string|null $_33
 * @property string|null $_34
 * @property string|null $_35
 * @property string|null $_36
 * @property string|null $_37
 * @property string|null $_38
 * @property string|null $_39
 * @property string|null $_3905
 * @property string|null $_40
 * @property string|null $_41
 * @property string|null $_4105
 * @property string|null $_42
 * @property string|null $_43
 * @property string|null $_44
 * @property string|null $_4405
 * @property string|null $_45
 * @property string|null $_46
 * @property string|null $_47
 * @property string|null $_48
 * @property string|null $_49
 * @property string|null $_50
 * @property string|null $_51
 * @property string|null $_52
 * @property string|null $_5205
 * @property string|null $_53
 * @property string|null $_54
 * @property string|null $_55
 * @property string|null $_5505
 * @property string|null $_56
 * @property string|null $_5605
 * @property string|null $_57
 * @property string|null $_5705
 * @property string|null $_58
 * @property string|null $_5805
 * @property string|null $_59
 * @property string|null $_5905
 * @property string|null $_60
 * @property string|null $_61
 * @property string|null $_62
 * @property string|null $_63
 * @property string|null $_64
 * @property string|null $_65
 * @property string|null $_66
 * @property string|null $_67
 * @property string|null $_68
 * @property string|null $_69
 * @property string|null $companion
 * @property string|null $relation
 * @property string|null $phone
 * @property string|null $obs
 * @property string|null $city
 * @property string|null $code
 * @property string|null $function
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $user_name
 * @property-read Patient $patient
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal query()
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where01($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where02($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where03($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where04($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where05($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where0505($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where06($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where07($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where0705($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where08($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where0805($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where09($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where1205($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where16($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where17($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where19($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where2005($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where21($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where22($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where23($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where2305($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where25($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where26($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where27($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where28($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where29($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where30($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where31($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where32($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where33($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where34($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where35($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where37($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where38($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where39($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where3905($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where41($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where4105($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where42($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where43($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where44($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where4405($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where45($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where46($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where47($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where48($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where49($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where50($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where51($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where52($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5205($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where53($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where54($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where55($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5505($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where56($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5605($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where57($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5705($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where58($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5805($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where59($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where5905($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where61($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where62($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where63($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where65($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where66($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where67($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where68($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal where69($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereCompanion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereObs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutoPersonal whereUserId($value)
 * @mixin \Eloquent
 */
class AutoPersonal extends Model
{
    use HasFactory;

    protected $table = 'auto_personals';
    protected $fillable = [
        'patient_id',
        'user_id',
        '_01',
        '_02',
        '_03',
        '_04',
        '_05',
        '_0505',
        '_06',
        '_07',
        '_0705',
        '_08',
        '_0805',
        '_09',
        '_10',
        '_11',
        '_12',
        '_1205',
        '_13',
        '_14',
        '_15',
        '_16',
        '_17',
        '_18',
        '_19',
        '_20',
        '_2005',
        '_21',
        '_22',
        '_23',
        '_2305',
        '_24',
        '_25',
        '_26',
        '_27',
        '_28',
        '_29',
        '_30',
        '_31',
        '_32',
        '_33',
        '_34',
        '_35',
        '_36',
        '_37',
        '_38',
        '_39',
        '_3905',
        '_40',
        '_41',
        '_4105',
        '_42',
        '_43',
        '_44',
        '_4405',
        '_45',
        '_46',
        '_47',
        '_48',
        '_49',
        '_50',
        '_51',
        '_52',
        '_5205',
        '_53',
        '_54',
        '_55',
        '_5505',
        '_56',
        '_5605',
        '_57',
        '_5705',
        '_58',
        '_5805',
        '_59',
        '_5905',
        '_60',
        '_61',
        '_62',
        '_63',
        '_64',
        '_65',
        '_66',
        '_67',
        '_68',
        '_69',
        'companion',
        'relation',
        'phone',
        'obs',
        'city',
        'code',
        'function',
    ];

    protected $appends = ['user_name'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function getUserNameAttribute(): string
    {
        return $this->user->name;
    }
}
