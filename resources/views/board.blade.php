@extends('layout.layout')

<link rel="stylesheet" href="/css/board.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/js/board.js"></script>

@section('title', 'View')

@section('content')

<div class="board_content">
    @foreach($boardList as $board)
    @if($board->board_comment_id === 0)
    <div class="board_content_onePage">
        <div class="board_title">
            <h2>{{$board->title}}</h2>
        </div>
        <div class="board_content_inText">
            {!!$board->content!!}
        </div>
        <div class="board_comment">
            <p onclick="stateComment(this)"> 댓글 보기 </p>
            <div class="board_comment_display">
              <input type="hidden" value="0">
                <div class="board_comment_inText">
                    @foreach($boardList as $comment)
                    @if($board->board_id === $comment->board_comment_id)
                    <div class="board_comment_getText">
                      <div class="board_comment_user">
                        <p> {{$comment->title}} </p>
                      </div>
                      <div class="board_comment_content">
                        {!!$comment->content!!}
                      </div>
                      <div class="board_comment_btn">
                        <input type="button" value="삭제" onclick="location.href='/board/comment/delete/{{$comment->board_id}}/{{$comment->user}}'">
                      </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <div class="board_comment_write">
                  <div class="board_comment_write_user">
                    <p></p>
                  </div>
                    <div class="board_comment_write_input" contenteditable="true">

                    </div>
                    <div class="board_comment_write_btn">
                      <input type="button" value="Enter" onclick="commentAdd(this, {{$board->board_id}}, '{{$board->tag}}')">
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    @endif
    @endforeach
</div>


@foreach($boardList as $board)

@endforeach

@endsection
