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
            //今週の
            $avg_study_this = $user->avg_this(0, $id);
            $avg_private_this = $user->avg_this(1, $id);
            $avg_communication_this = $user->avg_this(2, $id);
            $avg_health_this = $user->avg_this(3, $id);
            $avg_work_this = $user->avg_this(4, $id);
            //先週の
            $avg_study_last = $user->avg_last(0, $id);
            $avg_private_last = $user->avg_last(1, $id);
            $avg_communication_last = $user->avg_last(2, $id);
            $avg_health_last = $user->avg_last(3, $id);
            $avg_work_last = $user->avg_last(4, $id);
            
            
            
            $data = [
                    'user' => $user,
                    'study' => $study,
                    'private' => $private,
                    'communication' => $communication,
                    'health' => $health,
                    'work' => $work,
                    'avg_study_this' => $avg_study_this,
                    'avg_private_this' => $avg_private_this,
                    'avg_communication_this' => $avg_communication_this,
                    'avg_health_this' => $avg_health_this,
                    'avg_work_this' => $avg_work_this,
                    'avg_study_last' => $avg_study_last,
                    'avg_private_last' => $avg_private_last,
                    'avg_communication_last' => $avg_communication_last,
                    'avg_health_last' => $avg_health_last,
                    'avg_work_last' => $avg_work_last,
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