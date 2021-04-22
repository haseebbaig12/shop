<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *take care fee aman aallah bbye janu*/
     
    public function run()
    {
        $this->creteusertype();
        $this->creteuser();
        $this->site();
        $this->language();
        $this->siteuser();




    }
    protected function creteusertype(){
        $data = [
            ['title' => 'super_admin', 'name' => 'Super Admin', 'level' => 1],
            ['title' => 'admin', 'name' => 'Admin', 'level' => 2],
            ['title' => 'client', 'name' => 'client', 'level' => 3],

        ];
        DB::table('user_types')->insert($data);
    }
    protected function creteuser()
    {
        $password = Hash::make('demo');
        $data=[
            [
                'parentId'=>0,
                'name' => 'Super Admin',
                'user_type' => 'super_admin',
                'email' => 'Sadmin@it.com',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            [
                'parentId'=>0,
                'name' => 'ADMIN',
                'email' => 'Admin@it.com',
                'password' => $password,
                'user_type' => 'admin',

                'remember_token' => Str::random(10),
            ],

            [
                'parentId'=>0,
                'name' => 'Client',
                'email' => 'demo@it.com',
                'user_type' => 'client',
                'password' => $password,

                'remember_token' => Str::random(10),
            ],

        ];
        $user=DB::table('users')->insert($data);

    }
    protected function site(){
        $data=[
            'name' => 'English',
            'sku' => 'English',
            'status' =>1,
            'user_id'=>1
        ];

        $user=DB::table('sites')->insert($data);
    }
    protected function siteuser(){
        $data=[
            [
            'user' => 1,
            'site' => 1,
                ],
            [
                'user' => 2,
                'site' => 1,
            ],
            [
                'user' => 3,
                'site' => 1,
                ]
        ];
        $user=DB::table('user_site')->insert($data);
    }
    protected function language(){

        $data=[
            [
            'name' => 'English',
            'sku' => 'English',
            'status'=>1,
            'site_id'=>1,
            'user_id'=>1
                ],
            [
                'name' => 'English',
                'sku' => 'English',
                'status'=>1,
                'site_id'=>1,
                'user_id'=>2
            ],
            [
            'name' => 'English',
            'sku' => 'English',
            'status'=>1,
            'site_id'=>1,
            'user_id'=>3
        ]
        ];
        $user=DB::table('languages')->insert($data);
    }
}

