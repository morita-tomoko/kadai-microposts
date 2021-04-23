<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
//多対多の関係を正確に記述するため、Micropostモデルにも favorite_users() のような名前の関数を用意して belongsToMany() を指定してください。
        /**
     * お気に入り一覧を取得する
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'micropost_id')->withTimestamps();
    }

}
