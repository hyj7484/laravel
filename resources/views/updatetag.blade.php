<link rel="stylesheet" href="/css/addtag.css">
<script type="text/javascript" src="/js/addtag.js"></script>
@extends('layout.layout')

@section('title', '태그 수정')

@section('content')

<div class="addtag_display_inlneBlock" id="addtag_display_left">
  <!-- now Tag List -->
  <div class="addtag_table">

    <div class="addtag_inText">
    @foreach($tagList as $tag)
    <div class="addTag_txt">
      <p onclick="clickTag(this)"> {{$tag->tagname}} </p>
    </div>
    @endforeach
    </div>
  </div>
</div>
<div class="addtag_display_inlneBlock" id="addtag_display_right">
  <!-- update Tag option -->
  <div class="addtag_table">
    <div class="addtag_inText">
      <div id="addTag">
        <input type="text" id="tagName">
        <input type="button" value="addTag" onclick="addTag()"> <br>
        <input type="button" name="" value="delete" onclick="deleteTag()">
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
