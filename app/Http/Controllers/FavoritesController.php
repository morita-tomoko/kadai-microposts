<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * データーのお気に入り登録をするアクション
     *
     * @param  $id  micropostのid
     * @return \Illuminate\Http\Response
     *///$id=micropost_id
    public function store(Request $request, $id)
    { 
        // 認証済みユーザ（閲覧者）が、 micropostsをfavoriteする
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * データーのお気に入り削除するアクション
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをunfavoriteする
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
