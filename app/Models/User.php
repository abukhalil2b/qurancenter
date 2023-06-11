<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $guarded = [];

    protected $hidden = [
        'idcard',
        'password',
        'remember_token',
    ];


    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class,'teacher_id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'user_permission','user_id','permission_id');
    }

    public function hasPermission($slug){
        return (bool) $this->permissions()->where('slug',$slug)->first();
    }

}
