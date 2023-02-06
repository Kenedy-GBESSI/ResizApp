const notificationError = document.querySelector(".notification-error"),
      eltForm = document.querySelector("form"),
      submitButton = eltForm .querySelector(".btn-input");

submitButton.onclick = (e) =>{
     e.preventDefault();
     let xhr = new XMLHttpRequest();
     xhr.open("POST","./Backend/signup.php",true);
     xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == 'success'){
                    location.href="./dashboard.php";
                }else{
                    notificationError.innerHTML = data;
                    notificationError.style.display= 'block';
                }
            }
         }
     }
     const formData = new FormData(eltForm);
     xhr.send(formData);
}
    

