<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function search(Request $request){



        $keyword = $request->input('search');
        $developers = Developer::where('email','like','%'.$keyword.'%')->get();


        return view('welcome',['developers'=> $developers]);

    }

}
