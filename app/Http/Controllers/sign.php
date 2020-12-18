<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tag;
use Illuminate\Support\Facades\DB;

class sign extends Controller
{
    function __invoke(){
      return view('sign',  ['tagList' => tag::getTagList()]);
    }

    function sign(Request $res){
      $id   = $res['id'];
      $pw   = $res['pw'];
      $name = $res['name'];
      $e = null;
      $e = $this->Validation($id, $pw, $name);
      if($e != null){
        return "<script>
        alert('Error : {$e}');
        history.back();
        </script>";
      }else{
        $this->addUser($id, $pw, $name);
        return "<script> location.href='/login'; </script>";
      }
    }

    private function Validation($id, $pw, $name){
      $getData = DB::table('user')->where('user_id', $id)->first();
      if($getData != null){
        return "아이디가 존재합니다.";
      }
      if(strlen($id) < 6){
        return "아이디가 잘못되었습니다. ( 6자이상 입력 )";
      }
      if(strlen($pw) < 6){
        return "비밀번호가 잘못되었습니다. ( 6자이상 입력 )";
      }
    }

    private function addUser($id, $pw, $name){
      DB::table('user')->insert([
        'user_id' => $id,
        'user_pw' => $pw,
        'user_name' => $name,
        'lastLogin' => date("Y-m-d"),
      ]);
    }
}
