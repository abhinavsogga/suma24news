<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug'
    ];

    /**
     * Boot the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function getExcerptAttribute()
    {
        return $this->getExcerptByLength($this->description, 50);
    }

    public function getLongExcerptAttribute()
    {
        return $this->getExcerptByLength($this->description, 200);
    }

    protected function getExcerptByLength(string $text, int $length)
    {
        return Str::limit($text, $length, '...');
    }
}