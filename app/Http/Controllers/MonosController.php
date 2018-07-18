<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $monos = $user->feed_monos()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'monos' => $monos,
            ];           
            $data += $this->counts($user);
            return view('users.show', $data);
        }
        return view('welcome', $data);
    }
    */
     $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            //$monos = Mono::all();

            $data = [
                'user' => $user,
                'monos' => $monos,
            ];
            $data += $this->counts($user);
            return view('users.timeline', $data);
        }else {
            return view('welcome');
        }
        
        
    }

    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'content' => 'required|max:191',
        ]);

        $request->user()->monos()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    
    
    public function destroy($id)
    {
        $mono = \App\Mono::find($id);

        if (\Auth::id() === $mono->user_id) {
            $mono->delete();
        }

        return redirect()->back();
    }


}
