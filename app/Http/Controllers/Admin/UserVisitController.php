<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\UserVisit;

class UserVisitController extends Controller
{
    public function index(Request $request)
    {
        $visits = UserVisit::all();

        return view('admin.user-visits.index', compact('visits'));
    }
}