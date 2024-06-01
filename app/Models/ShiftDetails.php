<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class ShiftDetails extends Model
{
    use HasFactory;
    protected $table = 'shifts_details';
    protected $primaryKey = 'assignment_id';
    // protected $fillable = [
    //     'shift_id',
    //     'assignment_user_id',
    // ];



    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignment_user_id');
    }
    public function scopeApproved(Builder $query): void
    {
        $query->where('assignment_status', 'approved');
    }
    // public function scopeInVacation(Builder $query,$start,$end): void
    // {
    //     $query->where('assignment_start','>=', $start)->where('assignment_start','<=', $end);
    // }
}
