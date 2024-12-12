<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page1()
    {
        $name = "Joseph Maniquis";
        // $users = DB::table('users')
        //     ->where(function($q) use($name):void{
        //         $q->where('role','admin');
        //         $q->orwhere('role','student');
        //     })
        //     ->orderBy('id', 'desc')
        //     ->get(['email', 'password']);
        // dd($users);
        $users = DB::table('users')->paginate(10);

        return view('page1', compact('name', 'users'));
    }

    public function page2()
    {
        $age = "23";
        return view('page2', compact('age'));
    }

    public function page3()
    {
        $sex = "Yes";
        return view('page3', compact('sex'));
    }
}
