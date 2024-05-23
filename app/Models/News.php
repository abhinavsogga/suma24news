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

    public function getLatestNews(int $limit = 10) {
        return self::latest()
            ->take($limit)
            ->get();
    }

    public function getLatestBreakingNews(int $limit = 10)
    {
        return self::where('is_breaking', 1)
            ->latest()
            ->take($limit)
            ->get();
    }

    public function getFeaturedNews(int $limit = 3)
    {
        return self::inRandomOrder()->take(3)->get();
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
}
