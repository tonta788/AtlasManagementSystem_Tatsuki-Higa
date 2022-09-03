<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

use App\Models\Users\User;

class Subjects extends Model
{
    const UPDATED_AT = null;


    protected $fillable = [
        'subject'
    ];

    public function users(){
        return $this->hasMany('App\Models\Users\User', 'subject_users', 'user_id', 'subject_id')->withPivot('user_id', 'id');
        // リレーションの定義
    }
}
