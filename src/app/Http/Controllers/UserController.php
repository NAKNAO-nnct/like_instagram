<?php

namespace App\Http\Controllers;

use App\User;
use Exception;

class UserController extends Controller
{
    // ユーザ追加
    public function index()
    {
        // データの追加 emailの値はランダムな文字列を使用。「.」で文字列の連結
        $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
        User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
        // 全データの取り出し
        $users = User::all();
        return view('user', ['users' => $users]);
    }

    // ユーザ一覧表示
    public function show()
    {
        $users = User::all();
        return view('user', ['users' => $users]);
    }

    // ユーザ削除
    public function delete($email)
    {
        try {
            // 該当メールアドレスユーザの取得
            $user = User::where('email', $email)->firstOrFail();
            $user->delete();
            $label = 'success';
            $message = '';
        } catch (Exception $e) {
            $label = 'failure';
            $message = $e->getMessage();
        }
        return view('user_delete', ['label' => $label, 'message' => $message]);
    }
}
