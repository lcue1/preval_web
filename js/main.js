window.onload = function() {
 //   writeText();
 hadleMenu();
}
const writeText=()=>{
    const initModalScreen =document.getElementById("initModalScreen")
    const textInitModalScreen = document.getElementById("textInitModalScreen");
    const text="Preval, tu aliado en estructuras de fibra de vidrio con mas de 15 anos de experiencia en el sector. ";

    let index = 0;
    const type = () => {
        if (index < text.length) {
            textInitModalScreen.innerHTML += text.charAt(index);
            index++;
            setTimeout(type, 40); 
        }else{
            setTimeout(() => {
                initModalScreen.classList.add("initModalScreem--fadeOut");
                setTimeout(() => {
                    initModalScreen.remove()
                }, 1000);
            }, 1000); 
            
        }
    }; 

    type();

}

const hadleMenu = ()=>{
    const btnMenu = document.getElementById("btnMenu");
    btnMenu.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("click");
        constnavbarContainer = document.getElementById("navbarContainer");
        navbarContainer.classList.toggle("navbarContainer--active");
    })

}