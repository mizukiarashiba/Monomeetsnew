<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_monos = $user->monos()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_favoritings = $user->favoritings()->count();
        $count_wantings = $user->wantings()->count();
        $count_wanters = $user->wanters()->count();
        $count_posts = $user->posts()->count();

        


        return [
            'count_monos' => $count_monos,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favoritings' => $count_favoritings,
            'count_wantings' => $count_wantings,
            'count_wanters' => $count_wanters,
            'count_posts' => $count_posts,

            

        ];
    }
    
    


}
