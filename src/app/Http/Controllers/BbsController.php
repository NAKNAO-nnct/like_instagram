<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bbs;


class BbsController extends Controller
{
    // Indexページの表示
    public function index()
    {
        // 全データの取り出し
        $bbs = Bbs::all();
        // bbs.indexにデータを渡す
        return view('bbs.index', ["bbs" => $bbs]);
    }

    // 投稿された内容を表示するページ
    public function create(Request $request)
    {

        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required|min:5|max:140',
        ]);

        // 投稿内容の受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');

        // データベーステーブルbbsに投稿内容を入れる
        Bbs::insert(["name" => $name, "comment" => $comment]);

        // 全データの取り出し
        $bbs = Bbs::all();
        // bbs.indexにデータを渡す
        return view('bbs.index', ["bbs" => $bbs]);
    }
}
