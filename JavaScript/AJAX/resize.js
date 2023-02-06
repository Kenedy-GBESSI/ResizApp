const eltData = document.querySelector("form"),
       textError = document.querySelector(".error-notif"),
       submittBtn = eltData.querySelector("button"),
       downloadTag = document.querySelector(".download_tag");
submittBtn.onclick = (e) =>{
  e.preventDefault();
  let xhr = new XMLHttpRequest();
  xhr.open("POST","./Backend/resize.php");
  xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data == 'success'){
              downloadTag.classList.add("active");
            }else{
              textError.innerHTML = data;
              textError.style.display = "block";
            }
        }
    }
  }
  let formData = new FormData(eltData);
  xhr.send(formData);

}
