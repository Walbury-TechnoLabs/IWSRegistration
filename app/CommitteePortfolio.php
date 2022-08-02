<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteePortfolio extends Model
{
    use SoftDeletes;

    public $table = 'committee_portfolio';

    protected $appends = [
        'logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'committee_id',
        'portfolio_id',
    ];
}
