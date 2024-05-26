<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVisit;

class UserVisitController extends Controller
{
    public function logTimeSpent(Request $request)
    {
        $visit = UserVisit::find($request->visit_id);

        if ($visit) {
            $visit->update(['time_spent' => $request->time_spent]);
        }

        return response()->json(['status' => 'success']);
    }
}