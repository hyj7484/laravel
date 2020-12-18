function pageload(){
  console.log('board Page');
}

function stateComment(tag){
  let commentDiv = tag.parentElement;
  let commentDisplay = commentDiv.childNodes[3];
  let board_state = commentDisplay.childNodes[1];
  if(board_state.value == 0){
    commentDisplay.style.display = "block";
    board_state.value = 1;
  }else if(board_state.value == 1){
    commentDisplay.style.display = "none";
    board_state.value = 0;
  }
  stateCommentWrite(commentDisplay.childNodes[5]);
}

function stateCommentWrite(tag){
  let commentWrite = tag;
  let comment_content = commentWrite.childNodes[3];
  comment_content.innerHTML = "";
  let userDiv = commentWrite.childNodes[1].childNodes[1];
  if(sessionStorage.getItem('id') == null){
    commentWrite.style.display = "none";
  }else if(sessionStorage.getItem('id') != null){
    commentWrite.style.display = "block";
    userDiv.innerHTML = sessionStorage.getItem('name');
  }
}

function commentAdd(argTag, argBoard_id, argBoard_tag){
  let mainTag = argTag.parentElement.parentElement.childNodes;
  let comment_Text = mainTag[3];
  if(comment_Text.textContent == ""){
    return;
  }
  comment_Text = $(comment_Text).html();

  let user = sessionStorage.getItem('name');
  let userId = sessionStorage.getItem('id');

  let sendForm = document.createElement('form');
  sendForm.method = 'post';
  sendForm.action = '/board/add/comment';

  let board_input_id = document.createElement('input');
  let board_input_tag = document.createElement('input');
  let board_input_user = document.createElement('input');
  let board_input_comment = document.createElement('input');
  let board_input_userId = document.createElement('input');

  board_input_id.setAttribute('type', 'hidden');
  board_input_id.setAttribute('name', 'id');
  board_input_id.setAttribute('value', argBoard_id);

  board_input_tag.setAttribute('type', 'hidden');
  board_input_tag.setAttribute('name', 'tag');
  board_input_tag.setAttribute('value', argBoard_tag);

  board_input_user.setAttribute('type', 'hidden');
  board_input_user.setAttribute('name', 'user');
  board_input_user.setAttribute('value', user);

  board_input_comment.setAttribute('type', 'hidden');
  board_input_comment.setAttribute('name', 'comment');
  board_input_comment.setAttribute('value', comment_Text);

  board_input_userId.setAttribute('type', 'hidden');
  board_input_userId.setAttribute('name', 'user_id');
  board_input_userId.setAttribute('value', userId);

  sendForm.appendChild(board_input_id);
  sendForm.appendChild(board_input_tag);
  sendForm.appendChild(board_input_user);
  sendForm.appendChild(board_input_comment);
  sendForm.appendChild(board_input_userId);

  document.body.appendChild(sendForm);
  sendForm.submit();
}

function commentDelete(tag, id) {
  httpRequest = new XMLHttpRequest();
  let url = "/board/comment/delete/"+id
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
