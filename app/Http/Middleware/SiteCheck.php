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

        $site_id = '';
        $R_Site='';
        $R_Site = $request['site'];
        if($R_Site!=Null){
            $R_Site=$R_Site;
        }
        $user = Auth::user()->id;

        // $user = userSite::where('user',$user);
        $site_data = userSite::where('user', $user)->get()->first();
        $site_id = $site_data['site'];
//        dd($site_id);
        if ($R_Site != $site_id) {
            $site=[
                'site'=>$R_Site
            ];
            $site_id = $site_data->update($site);
        } else {
            $site_id=$site_id;
        }
            $languages = Language::where('site_id', $site_id)->get()->first();
            if (empty($languages)) {

                $languages = Null;
            } elseif (!empty($languages)) {
                $languages = $languages;
            }
            $a = session(

                [
                    'id' => $user,
                    'site' => $site_id,
                    'language' => $languages
                ]
            );
            dd(session()->get($a));


            return $next($request);
        }

}
