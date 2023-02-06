let xhr = new XMLHttpRequest();
xhr.open("GET","./Backend/get_user_infos.php",true);
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
