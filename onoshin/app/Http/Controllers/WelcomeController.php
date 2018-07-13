<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Goal;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログインしている場合、Usershowにいく
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $id = $user->id;
            $data = [];
            $study = \DB::table('goals')->where('user_id', $id)->where('category', '0')->orderBy('id', 'DESC')->take(10)->get();
            $private = \DB::table('goals')->where('user_id', $id)->where('category', '1')->orderBy('id', 'DESC')->take(10)->get();
            $communication = \DB::table('goals')->where('user_id', $id)->where('category', '2')->orderBy('id', 'DESC')->take(10)->get();
            $health = \DB::table('goals')->where('user_id', $id)->where('category', '3')->orderBy('id', 'DESC')->take(10)->get();
            $work = \DB::table('goals')->where('user_id', $id)->where('category', '4')->orderBy('id', 'DESC')->take(10)->get();
            $avg_study = $user->avg(0, $id);
            $avg_private = $user->avg(1, $id);
            $avg_communication = $user->avg(2, $id);
            $avg_health = $user->avg(3, $id);
            $avg_work = $user->avg(4, $id);
        
            $data = [
                'user' => $user,
                'study' => $study,
                'private' => $private,
                'communication' => $communication,
                'health' => $health,
                'work' => $work,
                'avg_study' => $avg_study,
                'avg_private' => $avg_private,
                'avg_communication' => $avg_communication,
                'avg_health' => $avg_health,
                'avg_work' => $avg_work
            ];
        
        $data += $this->counts($user);

            return view('users.show', $data);
        }
        //ログインしていないとトップに
        else {
            return view('welcome');
        }
    }
}