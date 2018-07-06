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
        //長くなってしまった申し訳ない。工夫は考えます
        $this->validate($request, [
            'content' => 'required|max:191',
             'rate' => 'required|numeric',
            'category' => 'required',
        ]);
        
        //二個目のフォームに何か一つでも入れられていたらValidate発動
        if(!(!isset($request->content2) && !isset($request->category2) && !isset($request->rate2)))
        {
           $this->validate($request, [
            'content2' => 'required|max:191',
             'rate2' => 'required|numeric',
            'category2' => 'required',
        ]); 
        }
        
        //三個目のフォームに何か一つでも入れられていたらValidate発動
        if(!(!isset($request->content3) && !isset($request->category3) && !isset($request->rate3)))
        {
           $this->validate($request, [
            'content3' => 'required|max:191',
             'rate3' => 'required|numeric',
            'category3' => 'required',
        ]); 
        }
        

        $request->user()->goals()->create([
            'content' => $request->content,
            'rate' => $request->rate,
            'category' => $request->category,
        ]);
        
        //二個目のフォームに全部入っていたら保存
        if(isset($request->content2) && isset($request->category2) && isset($request->rate2))
        {
            $request->user()->goals()->create([
            'content' => $request->content2,
            'rate' => $request->rate2,
            'category' => $request->category2,
        ]); 
        }

        //三個目のフォームに全部入っていたら保存        
        if(isset($request->content3) && isset($request->category3) && isset($request->rate3))
        {
            $request->user()->goals()->create([
            'content' => $request->content3,
            'rate' => $request->rate3,
            'category' => $request->category3,
        ]); 
        }

        return redirect('/');
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
