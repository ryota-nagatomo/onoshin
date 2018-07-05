<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Goal;


class CategoryController extends Controller
{
    
    // 間違えて作ったけどエラーが出るからファイル消さないで！！
    
    
    public function category(){
        
        $data = [];
        $english = \DB::table('goals')->where('category', '0')->take(10)->get();
        $own = \DB::table('goals')->where('category', '1')->take(10)->get();
        $people = \DB::table('goals')->where('category', '2')->take(10)->get();
        $health = \DB::table('goals')->where('category', '3')->take(10)->get();
        $other = \DB::table('goals')->where('category', '4')->take(10)->get();
        
        $data = [
                'english' => $english,
                'own' => $own,
                'people' => $people,
                'health' => $health,
                'other' => $other,
            ];
        return view(users.show, $data);
    }
}
