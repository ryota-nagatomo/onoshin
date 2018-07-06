<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add
use App\Goal;

class UsersController extends Controller
{
   public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        $data = [];
        $user = User::find($id);
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
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
}