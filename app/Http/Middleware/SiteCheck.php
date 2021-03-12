<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\userSite;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class SiteCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $site_id = '';
            $R_Site = '';
            $language=null;
            $R_Site = $request['site'];
//            dd($R_Site);
//            if ($R_Site != Null) {
//                $R_Site = $R_Site;
//            }

                $user_id = Auth::user()->id;
                $site_data = userSite::where('user', $user_id)->get()->first();
                $site_id = $site_data['site'];

                if ($R_Site != $site_id && $R_Site != NUll) {
                    $site = [
                        'site' => $R_Site
                    ];
                    $site_id = $site_data->update($site);
                } else {
                    $site_id = $site_id;
                }
                $languages = Language::where('user_id',$user_id)->where('site_id',$site_id)->where('status',1)->get();

//                if (empty($languages)) {
//
//                    $languages = Null;
//                } elseif (!empty($languages)) {
//                    $languages = $languages;
//                }
            if($languages != null){
                $languages=$languages;
            }
                $a = session(

                    [
                        'id' => $user_id,
                        'site' => $site_id,
                        'language' => $languages
                    ]
                );
//                dd(session()->get($a));

            }

            // $user = userSite::where('user',$user);




        return $next($request);
    }

}
