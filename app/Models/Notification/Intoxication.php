<?php

namespace App\Models\Notification;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Notification\Intoxication
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
 * @property string|null $_0605
 * @property string|null $_07
 * @property string|null $_08
 * @property string|null $_09
 * @property string|null $_10
 * @property string|null $_1005
 * @property string|null $_11
 * @property string|null $_12
 * @property string|null $_13
 * @property string|null $_14
 * @property string|null $_15
 * @property string|null $_16
 * @property string|null $_17
 * @property string|null $_18
 * @property string|null $_1805
 * @property string|null $_19
 * @property string|null $_20
 * @property string|null $_21
 * @property string|null $_2105
 * @property string|null $_22
 * @property string|null $_23
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
 * @property string|null $_3305
 * @property string|null $_34
 * @property string|null $_3405
 * @property string|null $_35
 * @property string|null $_36
 * @property string|null $_37
 * @property string|null $_38
 * @property string|null $_3805
 * @property string|null $_39
 * @property string|null $_40
 * @property string|null $_41
 * @property string|null $_42
 * @property string|null $_43
 * @property string|null $_44
 * @property string|null $_45
 * @property string|null $_46
 * @property string|null $_47
 * @property string|null $_48
 * @property string|null $_49
 * @property string|null $_4905
 * @property string|null $_50
 * @property string|null $_5005
 * @property string|null $_51
 * @property string|null $_52
 * @property string|null $_53
 * @property string|null $_54
 * @property string|null $_55
 * @property string|null $_56
 * @property string|null $_57
 * @property string|null $_58
 * @property string|null $_5805
 * @property string|null $_59
 * @property string|null $_60
 * @property string|null $_61
 * @property string|null $_62
 * @property string|null $_63
 * @property string|null $_6305
 * @property string|null $_64
 * @property string|null $_6405
 * @property string|null $_65
 * @property string|null $_66
 * @property string|null $_6605
 * @property string|null $_67
 * @property string|null $_68
 * @property string|null $_69
 * @property string|null $_70
 * @property string|null $_71
 * @property string|null $obs
 * @property string|null $city
 * @property string|null $code
 * @property string|null $function
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $user_name
 * @property-read Patient $patient
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where01($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where02($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where03($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where04($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where05($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where0505($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where06($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where0605($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where07($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where08($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where09($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where1005($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where16($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where17($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where1805($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where19($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where21($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where2105($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where22($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where23($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where25($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where26($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where27($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where28($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where29($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where30($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where31($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where32($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where33($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where3305($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where34($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where3405($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where35($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where37($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where38($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where3805($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where39($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where41($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where42($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where43($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where44($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where45($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where46($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where47($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where48($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where49($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where4905($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where50($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where5005($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where51($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where52($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where53($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where54($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where55($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where56($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where57($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where58($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where5805($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where59($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where61($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where62($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where63($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where6305($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where6405($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where65($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where66($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where6605($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where67($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where68($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where69($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where70($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication where71($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereObs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intoxication whereUserId($value)
 * @mixin \Eloquent
 */
class Intoxication extends Model
{
    use HasFactory;

    protected $table = 'intoxications';
    protected $fillable = [
        'patient_id',
        'user_id',

        //----
        '_01',
        '_02',
        '_03',
        '_04',
        '_05',
        '_0505',
        '_06',
        '_0605',
        '_07',
        '_08',
        '_09',
        '_10',
        '_1005',
        '_11',
        '_12',
        '_13',
        '_14',
        '_15',
        '_16',
        '_17',
        '_18',
        '_1805',
        '_19',
        '_20',
        '_21',
        '_2105',
        '_22',
        '_23',
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
        '_3305',
        '_34',
        '_3405',
        '_35',
        '_36',
        '_37',
        '_38',
        '_3805',
        '_39',
        '_40',
        '_41',
        '_42',
        '_43',
        '_44',
        '_45',
        '_46',
        '_47',
        '_48',
        '_49',
        '_4905',
        '_50',
        '_5005',
        '_51',
        '_52',
        '_53',
        '_54',
        '_55',
        '_56',
        '_57',
        '_58',
        '_5805',
        '_59',
        '_60',
        '_61',
        '_62',
        '_63',
        '_6305',
        '_64',
        '_6405',
        '_65',
        '_66',
        '_6605',
        '_67',
        '_68',
        '_69',
        '_70',
        '_71',

        //----

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
