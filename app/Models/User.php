<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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
