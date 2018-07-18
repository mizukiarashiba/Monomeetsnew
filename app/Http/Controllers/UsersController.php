<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Mono;






class UsersController extends Controller




{
    
    
    public function __construct() 
     { 
  
         $this->middleware('auth'); 
     } 

    
    
    public function index()
    {
        $users =  User::paginate(10);


        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    /*
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'monos' => $monos,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('users.index', [
            'users' => $users,
        ]);
        }
        
    }*/
    
    
    
      public function show($id)
    {
        $user = User::find($id);
        $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $monos,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
        
        
        
        
        
        

        
        
        
        
    }
    
    
    public function overview($id)
    {
        $user = User::find($id);
        $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $monos,
        ];

        $data += $this->counts($user);

        return view('users.timeline', $data);
    }
    
    
    
    public function chat($id)
    {
        $user = User::find($id);
        /* $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10); */

        $data = [
            'user' => $user,
        /*    'monos' => $monos,    */
        ];

        $data += $this->counts($user);

        return view('users.chat', $data);
    }
    

    public function seedetails($id)
    {
        $mono = Mono::find($id);
        //$user = User::find($id);
        $monos = [$mono];//$user->monos()->orderBy('created_at', 'desc')->paginate(10);
        $user = $mono->user()->get()[0];
        $data = [
            'user' => $user,
            'monos' => $monos,
        ];
//var_dump($user);
       $data += $this->counts($user);

        return view('monos.monopage', $data);
    }
    
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $favoritings = $user->favoritings()->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $favoritings,
        ];

        $data += $this->counts($user);

        return view('users.favoritings', $data);
        
        
    }

    

    
    public function wantings($id)
    {
        $user = User::find($id);
        $wantings = $user->wantings()->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $wantings,
        ];

        $data += $this->counts($user);

        return view('users.wantings', $data);
    }

    public function wanters($id)
    {
        $user = User::find($id);
        $wanters = $user->wanters()->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $wanters,
        ];

        $data += $this->counts($user);

        return view('users.wanters', $data);
    }
    
    
    
    
    
}
