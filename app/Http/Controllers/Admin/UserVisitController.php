<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\UserVisit;

class UserVisitController extends Controller
{
   

    public function index(Request $request)
    {
        // Fetch the visits grouped by user_id and guest_id with total time spent on each category
        $visits = UserVisit::select('user_id', 'guest_id', 'category_id', 'categories.title as category_title')
            ->selectRaw('SUM(time_spent) as total_time_spent')
            ->join('categories', 'categories.id', '=', 'user_visits.category_id')
            ->groupBy('user_id', 'guest_id', 'category_id', 'categories.title')
            ->orderBy('total_time_spent', 'desc')
            ->get();

        // Group visits by user_id and guest_id
        $groupedVisits = $visits->groupBy(function($visit) {
            return $visit->user_id ?? $visit->guest_id;
        });

        return view('admin.user-visits.index', compact('groupedVisits'));
    }
}