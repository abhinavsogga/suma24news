<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
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

    /**
     * Get the news articles associated with the category.
     */
    public function news()
    {
        return $this->hasMany(News::class)->orderBy('created_at', 'desc');
    }

    public function getLatestNews($limit = 10) {
        return $this->news()
            ->latest()
            ->take($limit)
            ->get();
    }

	/**
     * Get the status of the news article as a human-readable string.
     */
    public function getStatusTextAttribute(): string
    {
        return $this->status ? 'Active' : 'Inactive';
    }

     /**
     * Get the status of the category as a Bootstrap class.
     */
    public function getStatusClassAttribute(): string
    {
        return $this->status ? 'bg-primary' : 'bg-danger';
    }
}