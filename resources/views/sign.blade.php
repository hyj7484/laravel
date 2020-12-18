@extends('layout.layout')

<link rel="stylesheet" href="/css/sign.css">
<script type="text/javascript" src="/js/sign.js"></script>
@section('title', '회원가입')

@section('content')
<div id="sign_Div_Main">
  <div id="sign_Div_Table">
    <div id="sign_Div_Text">
      <form class="" action="/sign" method="post">
        <input class="sign_Input_Text" type="text" name="id" placeholder="아이디"> <br>
        <input class="sign_Input_Text" type="password" name="pw" placeholder="비밀번호"> <br>
        <input class="sign_Input_Text" type="text" name="name" placeholder="이름"> <br>
        <input class="sign_Input_Button" type="submit" value="회원가입">
      </form>
    </div>
  </div>
</div>
@endsection

@section('footer')

@endsection
