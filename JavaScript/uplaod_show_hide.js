const container = document.querySelector(".wrapper2"),
      input_file = document.querySelector(".container input"),
      img = document.querySelector(".wrapper2 .image img"),
      defautBtn = document.querySelector(".default-btn"),
      cancelBtn = document.querySelector("#cancel-btn"),
      downloadTagBtn = document.querySelector(".download_tag");



container.onclick = () =>{
    input_file.click();
    downloadTagBtn.classList.remove("active");
}

defautBtn.addEventListener('change', function(){
    const file = defautBtn.files[0]
     if(file){
        const reader = new FileReader();
        reader.onload = function(){
            const result = reader.result;
            img.src = result;
            cancelBtn.classList.add("active");
        }
        reader.readAsDataURL(file);
     }
})
