<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tag;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
  function __invoke(){
    return view('login', ['tagList' => tag::getTagList()]);
  }

  function login(Request $res){
    $userData = $this->getUser($res['id'], $res['pw']);
    if($userData == null){
      return "<script> history.back(); </script>";
    }

    $_SESSION['id'] = $res['id'];
    $_SESSION['pw'] = $res['pw'];
    $_SESSION['name'] = $userData->user_name;
    return "<script> location.href='/main'; </script>";

  }

  function logout(){
    $_SESSION = array();
    return "<script> history.back(); </script>";
  }

  private function getUser($id, $pw){
    return DB::table('user')->where('user_id', $id)->where('user_pw', $pw)->first();
  }
}

// Route::get('/login', login::class);
// Route::post('/login', [login::class, 'login']);
// Route::get('/logout', [login::class, 'logout']);
