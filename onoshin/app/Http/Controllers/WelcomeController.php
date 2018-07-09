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
            $english = \DB::table('goals')->where('user_id', $id)->where('category', '0')->take(10)->get();
            $own = \DB::table('goals')->where('user_id', $id)->where('category', '1')->take(10)->get();
            $people = \DB::table('goals')->where('user_id', $id)->where('category', '2')->take(10)->get();
            $health = \DB::table('goals')->where('user_id', $id)->where('category', '3')->take(10)->get();
            $other = \DB::table('goals')->where('user_id', $id)->where('category', '4')->take(10)->get();
        
            $data = [
                'user' => $user,
                'english' => $english,
                'own' => $own,
                'people' => $people,
                'health' => $health,
                'other' => $other,
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