<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'guest_id',
        'category_id',
        'url',
        'time_spent',
        'visited_at',
    ];

    /**
     * Define a belongsTo relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define a belongsTo relationship with the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
