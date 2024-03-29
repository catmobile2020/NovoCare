<?php

namespace App\Http\Controllers;

use App\Activity;
use DB;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::select('*', DB::raw('COUNT(screen) as count'))->groupby('activities.screen')->distinct()->paginate(15);
        return view('activity.index', compact('activities'));
    }

    public function show($screen)
    {
        $activities = Activity::where('screen', $screen)->paginate(15);
        return view('activity.show', compact('activities'));
    }
}
