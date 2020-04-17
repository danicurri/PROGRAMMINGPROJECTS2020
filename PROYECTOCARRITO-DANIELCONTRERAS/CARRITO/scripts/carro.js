
(function () {
let idDeCarro = document.getElementById("cart_items");
let idInterval;
let precioCompraCarritoVacio = document.getElementById("cprice");
//anchura del carrito de la compra
const MAX_ART_CARRITO = 4;
const ANCHO_ARTICULO = 120;
const DESPLAZAMIENTO = 50;

let sumaStock = (idArtStock) => {
    let stockIncremento = document.getElementById(idArtStock);
    let stockValor = stockIncremento.getElementsByClassName("stock")[0];
    let stockTotal = +stockValor.textContent.replace("Stock ","");
    stockTotal++;
    stockValor.innerHTML="Stock " + stockTotal;
}

let restaStock = (idArt) => {
    let item = document.getElementById(idArt);
    let stockValor = item.getElementsByClassName("stock")[0];
    let stockTotal = +stockValor.textContent.replace("Stock ","");//número de artículos que tenemos disponibles para comprar
    stockTotal--;
    stockValor.innerHTML="Stock " + stockTotal;

}
let StockCero = (stock, artId) => {
    let item = document.getElementById(artId);
    let stockItem = item.getElementsByClassName("stock")[0];
    item.style.cursor="default";//cuando tenemos stock = 0 , inhabilitamos cursor para todo el artículo en cuestión
    if(stock == 0) {
        stockItem.style.cursor="default";
        stockItem.innerHTML="Stock 0";
        stockItem.style.textDecoration="line-through";
        stockItem.className="agotado";
        stockItem.style.textAlign="center";
        stockItem.style.fontSize="14px";
        stockItem.style.letterSpacing="-1";
        stockItem.style.fontWeight="bold";
        stockItem.style.marginLeft="19px";
    }
    alert("No hay artículos disponibles");
}

function eliminarArticulo(idArtEnStock) {
    //borra el item del carrito de la compra 
    let borraArticulo= document.getElementById("c" + idArtEnStock);
    borraArticulo.remove();
    
    //vamos a sumar un artículo de vuelta al stock cd. eliminamos un art del carrito
    sumaStock(idArtEnStock);
    //disminuye el número de artículos comprados.
    DecrementarCompra();
    //vamos a actualizar el precio de la compra porque si eliminamos algún art hay que rebajar el precio
    DecrementarPrecio(idArtEnStock);
    //disminuye ancho del carrito
    let restaArtEnCarritoCompra = idDeCarro.children.length;
    let anchoCarrito = idDeCarro.clientWidth;
    if(restaArtEnCarritoCompra > MAX_ART_CARRITO) {
        idDeCarro.style.width = anchoCarrito - ANCHO_ARTICULO +'px'; 
    }
    //para que el enlace no viaje a otra página
    event.preventDefault();
}
   
//incrementamos el num. art. del carrito
let IncrementarCompra = () => {
     let incrementaArtComprados = document.getElementById("citem");
     let numArticulo = +incrementaArtComprados.value;
     numArticulo++;
     incrementaArtComprados.value=numArticulo;
     incrementaArtComprados.style.fontSize="14px";
}
//decrementamos el num. art. comprados del carrito
let DecrementarCompra = () => {
    let incrementaArtComprados = document.getElementById("citem");
    let numArticulo = +incrementaArtComprados.value;
    numArticulo--;
    incrementaArtComprados.value=numArticulo;
    incrementaArtComprados.style.fontSize="14px";
}

//Actualiza el precio total de la compra sumándole el precio del artículo.
let precioAcumulado = 0;
let IncrementarPrecio = (idArt) => {
    let item = document.getElementById(idArt);
    let contenidoArticulo = item.getElementsByClassName("price")[0].textContent;
    let priceArticulo=+contenidoArticulo.substring(0,contenidoArticulo.length - 1);//queremos pillar del precio,
    //el contenido, y de éste, todo menos el símbolo del €.
    precioAcumulado += priceArticulo;
    precioCompraCarritoVacio.value = +precioAcumulado + " €";
    precioCompraCarritoVacio.style.fontSize="14px";
}

precioAcumulado = 0;
//Actualiza el precio total de la compra restando el precio del artículo cd. ha sido eliminado
let DecrementarPrecio = (idArt) => {
    let item = document.getElementById(idArt);
    let contenidoArticulo = item.getElementsByClassName("price")[0].textContent;
    let priceArticulo=+contenidoArticulo.substring(0,contenidoArticulo.length - 1);//queremos pillar del precio,
    //el contenido, y de éste, todo menos el símbolo del €.
    precioAcumulado -= priceArticulo;
    precioCompraCarritoVacio.value = +precioAcumulado + " €";
    precioCompraCarritoVacio.style.fontSize="14px";
}

let anyadirArticulo = (idArt) => {
    clearInterval(idInterval);//paramos el setInterval usando su id cuando añadimos un artículo
    restaStock(idArt);
    IncrementarCompra();
    IncrementarPrecio(idArt);

    //clonamos el art. comprado, le ponemos mismo id añadiéndole "c" y lo metemos en el html dd. está el id cart_items
    let artEnCarrito = document.getElementById(idArt).cloneNode(true);
    artEnCarrito.setAttribute('id', 'c'+artEnCarrito.id);
    idDeCarro.insertBefore(artEnCarrito, idDeCarro.firstChild);//el último art. añadido entra por la izda del carrito
    
    let artEnCarritoCompra = idDeCarro.children.length;
    let ancho_Carrito = idDeCarro.clientWidth;
    if(artEnCarritoCompra > MAX_ART_CARRITO) {
        idDeCarro.style.width = ancho_Carrito + ANCHO_ARTICULO +'px'; 
    }
    //al pulsar botón anterior
    let botonAnterior = document.getElementById("btn_prev");
    let style = window.getComputedStyle(idDeCarro, '');
    let margenIzdo = parseInt(style.left);
    botonAnterior.addEventListener('click', function(){
        idDeCarro.style.left = margenIzdo + DESPLAZAMIENTO + 'px';
    })
    //al pulsar botón posterior
    let botonPosterior = document.getElementById("btn_next");
    botonPosterior.addEventListener('click', function(){
        idDeCarro.style.left = margenIzdo - DESPLAZAMIENTO + 'px';
    })
    
    //vamos a comprobar si el contenedor de art llega al borde del carrito  
    let carritoGrande = document.getElementById("cart_toolbar");
    let anchuraTotalCarrito = idDeCarro.getBoundingClientRect();
    let margenDcho = parseInt(style.right);

    if(anchuraTotalCarrito.left < margenIzdo) {
        idDeCarro.style.left="0px";
    }
    else if(anchuraTotalCarrito.right > margenDcho) {
        idDeCarro.style.left = -( carritoGrande.width - anchuraTotalCarrito.width) + 'px';
    }

    //Oculta el elemento de la clase stock del art. del carrito
     let stockDiv = artEnCarrito.getElementsByClassName("stock");
     stockDiv=Array.from(stockDiv);
     stockDiv.forEach(stock => {
           stock.style.display="none"; 
    });

    //Cambia la propiedad css cursor del elemento y de todos sus hijos al valor default.
     let children = Array.from(artEnCarrito.children);
     children.forEach(child => {
         child.style.cursor="default";
     });

    //Añade al principio del artículo un enlace (lo utilizaremos para eliminar el artículo del
    //carrito). El enlace creado debe tener este código:
    //<a href="" class="delete"></a>

     let enlace = document.createElement("a");
     let imagen = artEnCarrito.querySelector("img");
     enlace.className="delete";
     artEnCarrito.insertBefore(enlace, imagen);
    
    //por si queremos eliminar un art del carrito
        enlace.addEventListener('click', function() {
            let idArtCarrito = enlace.parentNode.getAttribute("id");//id del art. del carrito
            let idArtStock = idArtCarrito.replace("c", "");//id art. del stock
            eliminarArticulo(idArtStock)
        });

        //cuando pulsamos botón clear
        let botonClear = document.getElementById("btn_clear");
        botonClear.addEventListener('click', function(){
            let carritoItems = document.getElementsByClassName("back");
            carritoItems = Array.from(carritoItems);
            VaciarCarrito(carritoItems);
            clearInterval(idInterval);  
            //al vaciar el carrito, hay que llamar a setInterval
            idInterval = setInterval(rojoAmarillo, 1000);
        })
}

let VaciarCarrito = (carritoItems) => {
    for(let i = 0; i < carritoItems.length;i++){
        let articulo = carritoItems[i];
        let items = Array.from(articulo.children);
        items.forEach( item => {
            item.remove();
        })
    }

    //ponemos el valor de los productos a 0 euros
    precioCompraCarritoVacio.value= 0 + " €";
    console.log(precioCompraCarritoVacio.value);
    precioCompraCarritoVacio.style.fontSize="14px";
    //ponemos la cantidad de productos a 0
    let incrementaArtComprados = document.getElementById("citem");
    incrementaArtComprados.value="0";
    incrementaArtComprados.style.fontSize="14px";
    //ponemos la cantidad de stock a 10
    let stockA10 = Array.from(document.getElementsByClassName("stock"));
    stockA10.forEach(stock => {
        stock.textContent="Stock 10";
    })
}
//cambia fondo carrito de rojo a amarillo cada 1 seg
function rojoAmarillo() {
    let idCarritoVacio = document.getElementById("cart_items");
        idCarritoVacio.style.backgroundColor=idCarritoVacio.style.backgroundColor=="red" ? "yellow":"red";
}
window.onload = () => {
    idInterval = setInterval(rojoAmarillo, 1000);

    let items = document.getElementsByClassName("item");
    for(let i = 0; i < items.length;i++) {
        let articulo = items[i];
        articulo.addEventListener('dblclick',function() {
            let stock = +articulo.getElementsByClassName("stock")[0].textContent.replace("Stock ","");
            if(stock >= 1){
                anyadirArticulo(articulo.getAttribute("id"));
            } else {
                StockCero(stock,articulo.getAttribute("id"));
            }
        })
    }
}

})();