(function () {

    let colorGris = Array.from(document.getElementsByClassName("item"));
    colorGris.forEach(elem => {
        elem.style.backgroundColor = "#cecece";
    })

    let bordeNegro = document.getElementById("cart_items");
    bordeNegro.style.border = "black solid 4px";

    let bordeAzul = Array.from(document.getElementsByTagName("img"));
    bordeAzul.forEach(elem => {
        elem.style.border="blue solid 1px";
    })

    let subrayaLabel = document.querySelectorAll(".item label");
    subrayaLabel.forEach(elem => {
        elem.style.textDecoration="underline";
    })

    let fuenteRoja = document.querySelectorAll("#cart_container button");
    fuenteRoja.forEach(elem => {
        elem.style.color="red";
    })

    let fuenteBlanca = document.querySelectorAll(".item label+label");
    fuenteBlanca.forEach(label => {
        label.style.color="white";
    });

    let fondoAmarillo = Array.from(document.getElementsByTagName("div"));
    fondoAmarillo.forEach(elem => {
        if(elem.children.length === 0){
            elem.style.backgroundColor="yellow";
        }
    })

    let primerHijo = document.querySelector(".item:first-child");
    primerHijo.style.backgroundColor="red";
    
    let ultimoHijo = document.querySelector(".item:last-child");
    ultimoHijo.style.backgroundColor="red";

    let camisetaVerde = Array.from(document.getElementsByTagName("img"));
    camisetaVerde.forEach(elem => {
        if(elem.src.includes("img/camiseta")) {
            elem.style.borderColor = "1px solid green";
        }
    })

    let fuenteVerde = document.querySelectorAll("body input");
    fuenteVerde.forEach (elem => {
        elem.style.color = "green";
    })

    let euroVerde = Array.from(document.querySelectorAll(".price"));
    euroVerde.forEach(elem => {
        if(elem.innerText.includes("€")){
            elem.style.color = "green";
        }
    })
})();