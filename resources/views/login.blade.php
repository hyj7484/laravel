@extends('layout.layout')
<link rel="stylesheet" href="/css/login.css">
<script type="text/javascript" src="/js/login.js"></script>
@section('title', '로그인')

@section('content')
<div id="login_Div_Main">
  <div id="login_Div_Table">
    <div id="login_Div_Text">
      <form class="" action="/login" method="post">
        <input class="login_Input_Text" type="text" name="id" placeholder="아이디"> <br>
        <input class="login_Input_Text" type="password" name="pw" placeholder="비밀번호"> <br>
        <input class="login_Input_Button" type="submit" value="로그인">
      </form>
    </div>
  </div>
</div>
@endsection

@section('footer')

@endsection
