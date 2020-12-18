function layout_state_sideBar(){
  let sideBar = document.getElementById('layout_sidebar_left');
  let content = document.getElementById('layout_content');
  if(sessionStorage.getItem('state_sidebar') == 0){
    sideBar.style.display = "inline-block";
    content.style.width = 'calc(100% - 200px)';
    content.style.left = "200px";
  }else{
    sideBar.style.display = "none";
    content.style.width = "100%";
    content.style.left = "0px";
  }
  // console.log('sidebar state ' + sessionStorage.getItem('state_sidebar'));
}

function layout_state_sideBar_onclick(){
  let item = sessionStorage.getItem('state_sidebar') == 0 ? 1 : 0;
  sessionStorage.setItem('state_sidebar', item);
  layout_state_sideBar();
}

function admin(){
  let adminLine = document.getElementById('layout_admin');
  if(sessionStorage.getItem('id') == 'hyj7484'){
    adminLine.style.display = "block";
  }else{
    adminLine.style.display = "none";
  }
}

function setLoginBtn(){
  console.log('login Id : ' + sessionStorage.getItem('id'));
  let login = document.getElementById('layout_header_right_btn_login');
  let sign = document.getElementById('layout_header_right_btn_sign');
  let logout = document.getElementById('layout_header_right_btn_logout');
  if(sessionStorage.getItem('id') == null){
      logout.style.display = "none";
      login.style.display = "inline-block";
      sign.style.display = "inline-block";
    }else{
      logout.style.display = "inline-block";
      login.style.display = "none";
      sign.style.display = "none";
    }
}

function onclickLogout(){
  sessionStorage.removeItem('id');
  setLoginBtn();
  makeRequest('/logout');
  location.reload(true);
}

function makeRequest(url) {
  httpRequest = new XMLHttpRequest();
  if (!httpRequest) {
    alert('Giving up :( Cannot create an XMLHTTP instance');
    return false;
  }
  httpRequest.onreadystatechange = alertContents;
  httpRequest.open('GET', url);
  httpRequest.send();
}

function alertContents() {
  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      // 결과값 가져올 곳
    } else {
      alert('There was a problem with the request.');
    }
  }
}


window.onload = function () {
  layout_state_sideBar();
  admin();
  setLoginBtn();
  pageload();
}
