<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Goal;

class RankingController extends Controller
{
    public function good()
    {
        $goals = \DB::table('good_user')->join('goals', 'good_user.goal_id', '=', 'goals.id')->select('goals.*', \DB::raw('COUNT(*) as count'))->groupBy('goals.id', 'goals.created_at', 'goals.updated_at','user_id','goals.content','goals.rate','goals.category')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.good', [
            'goals' => $goals,
        ]);
    }
}