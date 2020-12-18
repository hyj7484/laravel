<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="/css/layout.css">
    <script type="text/javascript" src="/js/layout.js"></script>
    <script type="text/javascript">
    <?php if(isset($_SESSION['id'])){ ?>
      sessionStorage.setItem('id', <?php echo "'".$_SESSION['id']."'";?>)
      sessionStorage.setItem('name', <?php echo "'".$_SESSION['name']."'";?>)
    <?php } ?>
    </script>
  </head>
  <body>

    <!-- header start -->
    <header>
      <!-- header Left Line -->
      <div class="layout_header_left_area">
        <a href="/main"> Home </a>
      </div>
      <div class="layout_header_left_area">
        <img src="/image/taglist.jpg" alt="noImgToTag" onclick="layout_state_sideBar_onclick()">
      </div>
      <!-- header Left Line End -->

      <!-- header Right Line -->
      <div class="layout_header_right_area">
        <input type="button" class="layout_header_right_btn" id="layout_header_right_btn_login" value="Login" onclick="location.href='/login'">
        <input type="button" class="layout_header_right_btn" id="layout_header_right_btn_sign" value="Sign" onclick="location.href='/sign'">
        <input type="button" class="layout_header_right_btn" id="layout_header_right_btn_logout" value="logout" onclick="onclickLogout()">
      </div>
      <!-- header Right Line End -->
    </header>
    <!-- header End -->
    <!-- admin Line Start -->
    <div class="layout_admin" id="layout_admin">
      <div class="layout_admin_text">
        <a href="/write"> 글쓰기 </a>
      </div>
      <div class="layout_admin_text">
        <a href="/tag/update"> 태그추가 </a>
      </div>
      <div class="layout_admin_text">
        <a href="/calendar/updateCalendar"> 일정추가 </a>
      </div>
    </div>
    <!-- adminLine End -->
    <!-- content start -->
    <div class="layout_content">

      <!-- left SideBar start -->
      <div class="layout_sideBar_left" id="layout_sidebar_left">
        <!-- Image Line start -->
        <div class="layout_sideBar_left_img">
          <img src="/image/myPicture.jpg" alt="noImg">
        </div>
        <!-- Image Line End -->
        <!-- Tag Line Start -->
        <div class="layout_sideBar_left_content">
          @foreach($tagList as $tag)
          <a href="/board/{{$tag->tagname}}"> {{$tag->tagname}} </a>
          @endforeach
        </div>
        <!-- Tag Line End -->
      </div>
      <!-- left SideBar End -->

      <!-- content body start -->
      <div class="layout_content_body" id="layout_content">
        @yield('content')
      </div>
      <!-- content body End -->
    </div>
    <!-- content End -->
  </body>
</html>
