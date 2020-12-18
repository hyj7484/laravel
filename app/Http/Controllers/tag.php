<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tag extends Controller
{
    function __invoke($tag){
      return view('board',
      [
        'tagList' => tag::getTagList(),
         'boardList' => $this->getBoard($tag),
       ]);
    }
    function updateTag(){
      return view('updatetag', [
        'tagList' => tag::getTagList()
      ]);
    }

    function addTag(Request $res){
      $count = $this->getTagCount();
      $tagName = $res['tagName'];
      if($this->getTag($tagName)==null){
        DB::table('tag')->insert([
          'tagname' => $tagName,
          'tagNumber' => $count,
        ]);
      }
      return "<script> history.back(); </script>";
    }

    function delete(Request $res){
      DB::table('tag')->where('tagname', $res['getTag'])->delete();
      return "<script> history.back(); </script>";
    }

    function addComment(Request $res){
      $id = $res['id'];
      $tag = $res['tag'];
      $user = $res['user'];
      $userID = $res['user_id'];
      $comment = $res['comment'];
      DB::table('board')->insert([
        'board_comment_id' => $id,
        'title' => $user,
        'tag' => $tag,
        'user' => $userID,
        'content' => $comment,
        'date' => date('Y-m-d'),
      ]);

      return "<script> history.back(); </script>";
    }

    function deleteComment($argId, $argUser){
      if(isset($_SESSION['id']) && $_SESSION['id'] != $argUser){
          return "<script>
          alert('자신의 댓글만 삭제가 가능합니다.');
          history.back();
          </script>";
      }
      DB::table('board')->where('board_id', $argId)->delete();
      return "<script> history.back(); </script>";
    }
    function parentTag($parent, $child){

    }

    private function getBoard($tag){
      return DB::table('board')->where('tag', $tag)->get();
    }

    private function getTagCount(){
      return DB::table('tag')->count();
    }
    private function getTag($tag){
      return DB::table('tag')->where('tagname', $tag)->first();
    }
    public static function getTagList(){
      return DB::table('tag')->orderBy('tagnumber', 'desc')->get();
    }
}
