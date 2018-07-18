<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonoWantController extends Controller
{
     public function store(Request $request, $id)
    {
        \Auth::user()->want($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unwant($id);
        return redirect()->back();
    }
    
   
    

}
