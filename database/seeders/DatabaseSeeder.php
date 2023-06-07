<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'الدعم الفني',
                'profile'=>'admin',
                'idcard'=>'123456',
                'phone'=>'123456',
                'password'=>Hash::make('123456')
            ],
            [
                'name'=>'إبراهيم البيماني',
                'profile'=>'teacher',
                'idcard'=>'91171747',
                'phone'=>'91171747',
                'password'=>Hash::make('91171747')
            ],
            [
                'name'=>'أحمد العوفي',
                'profile'=>'teacher',
                'idcard'=>'99615429',
                'phone'=>'99615429',
                'password'=>Hash::make('99615429')
            ],
            [
                'name'=>'سعيد بن يحيى',
                'profile'=>'teacher',
                'idcard'=>'98939404',
                'phone'=>'98939404',
                'password'=>Hash::make('98939404')
            ]
        ];
        
        foreach($users as $user){
            User::create($user);
        }
    }
}
