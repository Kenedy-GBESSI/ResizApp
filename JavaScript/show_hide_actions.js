const main = document.querySelector(".dashboard-main"),
      historyBtns = main.querySelectorAll(".historique-item > span"),
      actionsItems = main.querySelectorAll(".actions");

const remove_all = (item) =>{
     actionsItems.forEach(el => {
        if(item !== el){
            el.classList.remove("active");
        }
     })
}
historyBtns.forEach(element => {
    element.onclick = () =>{
        const currentAction = element.parentElement.querySelector(".actions");
        element.parentElement.classList.toggle("active")
        remove_all(currentAction);
        currentAction.classList.toggle("active");
    }
});