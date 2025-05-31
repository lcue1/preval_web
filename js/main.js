window.onload = function() {
    writeText();
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
                 console.log("Texto completo");
            textInitModalScreen.innerText = "Bienvenido!"
            }, 1500); 
            
        }
    }; 

    type();

}

