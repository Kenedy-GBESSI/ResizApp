const form = document.querySelector("form"),
      pwdInput = form.querySelector(".password-field input"),
      spanIcon = form.querySelector(".password-field span");

spanIcon.onclick = () =>{
    if(pwdInput.type == "password"){
        pwdInput.type = "text";
        spanIcon.innerHTML = "visibility_off";
    }else{
        pwdInput.type = 'password';
        spanIcon.innerHTML = "visibility";
    }
}