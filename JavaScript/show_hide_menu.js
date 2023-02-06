const header = document.querySelector(".header"),
      menu = header.querySelector(".menu"),
      spanBtn = header.querySelector("span");

spanBtn.onclick = () =>{
    menu.classList.toggle("active");
}