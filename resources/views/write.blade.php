@extends('layout.layout')

<link rel="stylesheet" href="/css/write.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/js/write.js"></script>

@section('title', 'Write')

@section('content')
<!-- content write Main -->
<div class="write_layout_main">
  <!-- write title input Line -->
  <div class="write_title_div">
    <input type="text" id="write_title_input" placeholder="제목입력" ><br>
  </div>
  <!-- option select Line -->
  <div class="write_select_div">
    <select id="write_select_option" name="tagSel">
        @foreach($tagList as $tag)
          <option value="{{ $tag->tagname }}"> {{ $tag->tagname }} </option>
        @endforeach
    </select>
  </div>
  <hr>
  <!-- content Main -->
  <div class="write_content_div" contenteditable="true">

  </div>
  <!-- Enter footer Line -->
  <div class="write_footer_div">
    <input type="button" name="" value="Enter" onclick="writeEnter()">
  </div>
</div>
@endsection
