<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tag;
use Illuminate\Support\Facades\DB;

class write extends Controller
{
    function __invoke(){
      return view('write', ['tagList' => tag::getTagList()]);
    }

    function addBoard(Request $res){
      $title = $res['title'];
      $option = $res['option'];
      $content = $res['content'];
      $user = $res['user'];
      $this->insertBoard($title, $option, $content, $user);
      return "<script> location.href='/main'; </script>";
    }

    private function insertBoard($title, $option, $content, $user){
      DB::table('board')->insert([
        'title' => $title,
        'tag' => $option,
        'user' => $user,
        'content' => $content,
        'date' => date('Y-m-d'),
      ]);
    }
}
