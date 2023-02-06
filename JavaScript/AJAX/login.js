const  errorText = document.querySelector(".notification-error"),
       eltForm = document.querySelector("form"),
       submitBtn = eltForm.querySelector(".btn-input");

submitBtn.onclick = (e) =>{
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./Backend/login.php",true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == 'success'){
                    location.href="./dashboard.php";
                }else{
                    errorText.innerHTML = data;
                    errorText.style.display= 'block';
                }
            }
        }
    }
    let dataForm = new FormData(eltForm);
    xhr.send(dataForm);
}