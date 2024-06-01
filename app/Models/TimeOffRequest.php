<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;

class TimeOffRequest extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'start_time',
        'end_time',
        'status',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function isVacation(Model $model,$start,$end)
    // {
    //     dd($model);
    //     $this->where('start_time','>=', $start)->where('end_time','<=', $end);
    //     // return $this->count() > 0;
    // }
    public function scopeIsVacation(Builder $query, $start)
    {
        // dd($query);
        $st = Carbon::parse($start);
        $query
        ->whereDate('start_time', '<=', $st)
            ->whereDate('end_time', '>=', $st);
        // $query->where('start_time', [$st->toDateString(),$st->addDays(1)->toDateString()])->Where('end_time','<=',$start);

    }
}
