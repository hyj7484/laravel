function pageload(){

}
function addTag(){
  let tagName = document.getElementById('tagName');
  let sendForm = document.createElement('form');
  sendForm.method = 'post';
  sendForm.action = '/tag/add/action';

  let inputTag = document.createElement('input');

  inputTag.setAttribute('type', 'hidden');
  inputTag.setAttribute('name', 'tagName');
  inputTag.setAttribute('value', tagName.value);

  tagName.value = "";

  sendForm.appendChild(inputTag);
  document.body.appendChild(sendForm);
  sendForm.submit();
}

function deleteTag(){
  if(selector.selTag == null){
    return;
  }
  let getTag = selector.selTag.textContent;
  selector.selTag = null;

  let sendForm = document.createElement('form');
  sendForm.method = 'post';
  sendForm.action = '/tag/del';

  let tag_input_Text = document.createElement('input');

  tag_input_Text.setAttribute('type', 'hidden');
  tag_input_Text.setAttribute('name', 'getTag');
  tag_input_Text.setAttribute('value', getTag);

  sendForm.appendChild(tag_input_Text);

  document.body.appendChild(sendForm);
  sendForm.submit();
}

function clickTag(id){
  if(selector.selTag == id){
    selector.selTag.style.color = "black";
    selector.selTag = null;
  }else if(selector.selTag != null){
    selector.selTag.style.color = "black";
    selector.selTag = id
    selector.selTag.style.color = "red";
  }else if(selector.selTag == null){
    selector.selTag = id;
    selector.selTag.style.color = "red";
  }
}

var selector = {
  selTag : null,
};
