<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Goal;    // add

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
    
    public function create()
    {
        $goal = new Goal;

        return view('goals.create', [
            'goal' => $goal,
        ]);
        
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
             'rate' => 'required|numeric',
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
    
    public function search(Request $request)
    {
        //キーワード受け取り
        $keyword = $request->keyword;
        #クエリ生成
        $query = Goal::query();
        //もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('content','like','%'.$keyword.'%');
        }
        //ページネーション
        $goals = $query->orderBy('created_at','desc')->paginate(10);
        return view('goals.search')->with('goals',$goals)
        ->with('keyword',$keyword)
        ->with('message','検索結果');
    }
}
