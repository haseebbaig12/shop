<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'name',
//        'language',
        'sku',
        'status',
        'user_id',
        'site_id',
    ];
   public function language($id)
   {

       if($id){
      $adminid = Auth::user()->id;
// dd($adminid);
       $site= userSite::where('user', $adminid)->get()->first();

       $language = Language::where('user_id',$adminid)->where('site_id',$site->site)->where('status',1)->get();
       }else{

           $user = User::where('parentID',$id)->get()->first();
           // dd($user);
           $site= userSite::where('user',$user->id)->get()->first();
           // dd
           $language = Language::where('user_id',$id)->where('site_id',$site->site)->where('status',1)->get();
        //    dd($language);
        }
       return $language;
   }
}
