<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discipline extends Model
{
    use SoftDeletes;

    public $table = 'disciplines';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',

    ];

    public function committees()
    {
        return $this->belongsToMany(Committee::class);
    }
    
    public function getPrice()
    {
        return $this->price ? '$'.number_format($this->price, 2) : 'FREE';
    }

}
