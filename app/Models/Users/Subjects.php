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
        return $this->belongsToMany('App\Models\Users\User', 'subject_users', 'subject_id', 'user_id' )->withPivot('user_id','subject_id');
        // リレーションの定義
        // 第１引数:リレーション先のモデル名
        // 第2引数:リレーション先のテーブル名
        // 第3引数:自モデルの主キー
        // 第4引数:相手モデルの主キー
    }
}
