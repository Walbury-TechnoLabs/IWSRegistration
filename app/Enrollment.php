<?php

namespace App;

use App\Scopes\EnrollmentScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use SoftDeletes;

    public $table = 'enrollments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'user_id',
        'committee_id',
        'portfolio_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        'awaiting' => 'Awaiting',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new EnrollmentScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'committee_id');
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
