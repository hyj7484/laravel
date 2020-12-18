function pageload(){

}

function writeEnter(){
  console.log("Enter insert Content");

  let title = document.getElementById('write_title_input').value;
  let option = document.getElementById('write_select_option').value;
  let content = $('.write_content_div').html();
  let user = sessionStorage.getItem('id');

  let sendForm = document.createElement('form');
  sendForm.method = "post";
  sendForm.action = "/write/add";

  let inputTitle = document.createElement('input');
  let inputOption = document.createElement('input');
  let inputContent = document.createElement('input');
  let inputUser = document.createElement('input');

  inputTitle.setAttribute('type', 'hidden');
  inputTitle.setAttribute('name', 'title');
  inputTitle.setAttribute('value', title);

  inputOption.setAttribute('type', 'hidden');
  inputOption.setAttribute('name', 'option');
  inputOption.setAttribute('value', option);

  inputContent.setAttribute('type', 'hidden');
  inputContent.setAttribute('name', 'content');
  inputContent.setAttribute('value', content);

  inputUser.setAttribute('type', 'hidden');
  inputUser.setAttribute('name', 'user');
  inputUser.setAttribute('value', user);

  sendForm.appendChild(inputTitle);
  sendForm.appendChild(inputOption);
  sendForm.appendChild(inputContent);
  sendForm.appendChild(inputUser);

  document.body.appendChild(sendForm);
  sendForm.submit();

}
