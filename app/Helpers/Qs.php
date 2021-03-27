<?php

namespace App\Helpers;
use Auth;
class Qs{

    public static function getTeamAdmin()
    {
        return ['admin', 'super_admin', ];
    }
    public static function userIsAdmin()
    {
        return in_array(Auth::user()->user_type, self::getTeamAdmin());
    }

    public static function getTeamClient()
    {
        return ['client' ];
    }
    public static function userIsClient()
    {
        return in_array(Auth::user()->user_type, self::getTeamClient());
    }
}

