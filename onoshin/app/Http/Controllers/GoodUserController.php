<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodUserController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->good($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->ungood($id);
        return redirect()->back();
    }
    
    public function good()
    {
        \Auth::user()->good($goal->id);

        return redirect()->back();
    }

    public function ungood()
    {
       if (\Auth::user()->is_good($goal)) {
            $goal = Goal::where('code', $itemCode)->first()->id;
            \Auth::user()->ungood($goal);
        }
        return redirect()->back();
    }
}
