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
        if (\Auth::check()) {
        $user = \Auth::user();
        
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
        
        $data = [
        'content' => $request->content,
        'rate' => $request->rate,
        'user' => $user
        ];
        
        //二個目のフォームに全部入っていたら保存
        if(isset($request->content2) && isset($request->category2) && isset($request->rate2))
        {
            $request->user()->goals()->create([
            'content' => $request->content2,
            'rate' => $request->rate2,
            'category' => $request->category2,
        ]); 
            $data += ['content2' => $request->content2, 'rate2' => $request->rate2,];
        }

        //三個目のフォームに全部入っていたら保存        
        if(isset($request->content3) && isset($request->category3) && isset($request->rate3))
        {
            $request->user()->goals()->create([
            'content' => $request->content3,
            'rate' => $request->rate3,
            'category' => $request->category3,
        ]); 
            $data += ['content3' => $request->content3, 'rate3' => $request->rate3,];
        }
        
        return view('goals.template', $data);
        }
    }
    
    public function review()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $query = Goal::query();
            $latest = \DB::table('goals')->where('user_id', $user->id)->max('created_at');
            $goals = $query->where('user_id', $user->id)->where('created_at', $latest)->get();
            
            return view('goals.review', [
                'goals' => $goals,
            ]);
        }
    }

    public function reviewed(Request $request)
    {
        $this->validate($request, [
            'rate.*' => 'required|numeric',
        ]);
        
        foreach($request['rate'] as $key => $rate){
            $id = $request['id'][$key];
            
            $goal = Goal::find($id);
            $goal->rate = $rate;    // add
            $goal->save();
         
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
        //キーワードなど受け取り
        $keyword = $request->keyword;
        $category = $request->category;
        $rate = $request->rate;
        $relate = $request->relate;
        $day = $request->day;
        $user = $request->user;
        $relate2 = $request->relate2;
        #クエリ生成
        $query = Goal::query();
        //もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('content','like','%'.$keyword.'%');
        }
        //もしカテゴリがあったら
        if(!empty($category))
        {
            $query->where('category', $category);
        }
        //もしＲａｔｅがあったら
        if(!empty($rate))
        {
            if($relate == '0'){
                $query->where('rate', $rate);
            }
            if($relate == '1'){
                $query->where('rate', '>=', $rate);
            }
            if($relate == '2'){
                $query->where('rate', '<=', $rate);
            }
        }
        //もし日付があったら
        if(!empty($day))
        {
            if($relate2 == '0'){
                $query->where('created_at', $day);
            }
            if($relate2 == '1'){
                $query->where('created_at', '>=', $day);
            }
            if($relate2 == '2'){
                $query->where('created_at', '<=', $day);
            }
        }
        
        //ページネーション
        $goals = $query->orderBy('created_at','desc')->paginate(10);
        return view('goals.search')->with('goals',$goals)
        ->with('keyword',$keyword)
        ->with('message','検索結果');
    }
}
