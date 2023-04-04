<?php

namespace App;

use App\Scopes\CommitteeScope;
use App\Portfolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Committee extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'committees';

    protected $appends = [
        'photo'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CommitteeScope);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'committee_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function portfolio()
    {
        return $this->belongsToMany(Portfolio::class,CommitteePortfolio::class,'committee_id','portfolio_id');
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class);
    }

    public function scopeSearchResults($query)
    {
        $query->when(request('discipline'), function($query) {
                $query->whereHas('disciplines', function($query) {
                    $query->whereId(request('discipline'));
                });
            })
            ->when(request('portfolio'), function($query) {
                $query->whereHas('portfolio', function($query) {
                    $query->whereId(request('portfolio'));
                });
            });
    }
}
