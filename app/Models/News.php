<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'image',
        'is_breaking',
        'is_featured',
        'tags',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_breaking' => 'boolean',
        'is_featured' => 'boolean',
        'tags' => 'json',
    ];

    /**
     * Get the category that the news article belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the reporter that wrote the news article.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function scopeBreaking($query)
    {
        return $query->where('is_breaking', 1);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    public function getLatestBreakingNews(int $priorityCategoryId = 0, int $limit = 10)
    {
        return $this->getNewsQuery($priorityCategoryId)
            ->breaking()
            ->latest()
            ->take($limit)
            ->get();
    }

    public function getFeaturedNews(int $priorityCategoryId = 0, int $limit = 3)
    {
        return $this->getNewsQuery($priorityCategoryId)
            ->featured()
            ->latest()
            ->take($limit)
            ->get();
    }

    private function getNewsQuery(int $priorityCategoryId = 0)
    {
        $query = $this->newQuery();

        if ($priorityCategoryId > 0) {
            $query->orderByRaw("category_id = $priorityCategoryId DESC, created_at DESC");
        }

        return $query;
    }

    public function getLatestNews(int $priorityCategoryId = 0, int $limit = 10, ?string $date = null)
    {
        $query = $this->getNewsQuery($priorityCategoryId)
                    ->latest()
                    ->take($limit);

        if ($date) {
            $query->whereDate('created_at', '=', $date);
        }

        return $query->get();
    }

    public function getLatestByCategory(string $slug, int $limit = 4)
    {
        return self::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->latest()
        ->take($limit)
        ->get();
    }

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

    public function likes()
    {
        return $this->hasMany(LikeDislike::class)->where('is_like', true);
    }

    public function dislikes()
    {
        return $this->hasMany(LikeDislike::class)->where('is_like', false);
    }
}
