<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalsController extends Controller
{
   public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $goals = $user->goals()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'goals' => $goals,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
             'rate' => 'required',
            'category' => 'required',
        ]);

        $request->user()->goals()->create([
            'content' => $request->content,
            'rate' => $request->rate,
            'category' => $request->category,
        ]);

        return redirect()->back();
    }
    
     public function destroy($id)
    {
        $goal = \App\Goal::find($id);

        if (\Auth::id() === $goal->user_id) {
            $goal->delete();
        }

        return redirect()->back();
    }
}
