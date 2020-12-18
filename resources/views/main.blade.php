@extends('layout.layout')

<link rel="stylesheet" href="/css/main.css">
<script type="text/javascript" src="js/main.js"></script>
@section('title', '메인 Page')

@section('content')
<!-- content body main Line start -->
<div class="main_content_main">
  <div class="main_content_main_display">
    <div class="main_content_body_information_table">
      <!-- 가로로 스크롤 기능 만들기 -->
      <!-- 관련 Data 하나씩 보이기 -->
      <!-- 프로젝트 하나씩 보이기 -->
      <!-- 경력 사항 하나씩 넘기기 -->
      <div class="main_content_information">
        연락처 : 010-6800-7484 <br>
        카카오톡 : hyj7484@naver.com <br>
      </div>
    </div>
  </div>
  <div class="main_content_main_display">
    <div class="main_content_calander">
      <img src="/image/calendar.png" alt="noImg_Calander" onclick="location.href='/calendar'">
      <p> 일정보기  </p>
    </div>
  </div>
</div>
<div class="main_content_bottom">
  loading
</div>
<!-- content body main Line End -->
<!-- content body board Line Start -->

<!-- content body board Line End -->
@endsection
