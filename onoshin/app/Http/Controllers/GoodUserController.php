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
}
