<?php

namespace App\Models;
//use Auth;
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

       $site= userSite::where('user',1)->get()->first();

       $language = Language::where('user_id',$adminid)->where('site_id',$site->site)->where('status',1)->get();
       }else{

           $user = User::where('parentID',$id)->get()->first();
           // dd($user);
           $site= userSite::where('user',$user->id)->get()->first();
           // dd
           $language = Language::where('user_id',$id)->where('site_id',$site->site)->where('status',1)->get();
       }
       return $language;
   }
}
