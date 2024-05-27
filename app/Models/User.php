<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use app\Models;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Accessor for the role attribute
    public function getRoleAttribute()
    {
        // Get the user's role name or return null if the user has no roles
        return $this->roles->isEmpty() ? null : $this->roles->first()->name;
    }

    public function getMostVisitedCategoryAttribute()
    {
        $builder = UserVisit::where('user_id', $this->id);

        $mostVisitedCategory =
            $builder
            ->select('category_id', DB::raw('SUM(time_spent) as total'))
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();

        $mostVisitedCategory = $builder
            ->select('categories.title as category_title', 'category_id', DB::raw('SUM(time_spent) as total'))
            ->join('categories', 'categories.id', '=', 'user_visits.category_id')
            ->groupBy('category_id', 'categories.title')
            ->orderByDesc('total')
            ->first();

        if(isset($mostVisitedCategory->category_id) && $mostVisitedCategory->category_id > 0) {
            return $mostVisitedCategory->category_title . ' '. $mostVisitedCategory->total . ' seconds';
        }

        return '';
    }

    public static function getMostVisitedCategory($userId = null, $guestId = null)
    {
        if($userId) {
            $builder = UserVisit::where('user_id', $userId);
        }
        else {
            $builder = UserVisit::where('guest_id', $guestId);
        }

        $mostVisitedCategory =
            $builder
            ->select('category_id', DB::raw('SUM(time_spent) as total'))
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();

        return $mostVisitedCategory ? $mostVisitedCategory->category_id : 0;
    }
}
