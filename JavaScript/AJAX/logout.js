const  logoutBtn = document.querySelector(".logout");
logoutBtn.onclick = (e) =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","./Backend/logout.php",true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == 'success'){
                    location.href="./index.php";
                }
            }
        }
    }
    xhr.send();
}