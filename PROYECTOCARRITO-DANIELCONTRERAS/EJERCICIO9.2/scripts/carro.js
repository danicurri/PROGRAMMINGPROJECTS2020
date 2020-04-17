/*
 Al cargar la página debe aparecer el primer producto de la lista de artículos dentro 
del carrito, simulando que se ha comprado un artículo camiseta 1. Para ello,
sigue los siguientes pasos:
o Añade al archivo carro.js un IIFE, dentro del cual, realizarás el resto del ejercicio.
*/
'use strict';

(function () {
const MAX_NUM_ART = 10;
/*
o Utilizando las funciones del DOM, haz una copia del artículo.
Como esta copia la tienes que introducir en el carrito, para evitar tener un id duplicado
añádele al atributo id una “c” delante. Construye el id de la siguiente forma:
“c” + id. No puedes usar innerHTML.
*/

let div =document.getElementsByClassName('item')[0].
        cloneNode(true); //clonamos el primer item

//y ponemos su atributo a "c + i1"
div.setAttribute('id', 'c'+div.id);

//Oculta el elemento de la clase stock (para hacer esto, puedes añadirle el estilo display: none).

let stockDiv = div.getElementsByClassName("stock");
stockDiv[0].style.display="none";

//o Cambia la propiedad css cursor del elemento y de todos sus hijos al valor default.

let children = div.children;
children = Array.from(children);
children.forEach(child => {
    child.style.cursor="default";
});

/*
o Añade al principio del artículo un enlace (lo utilizaremos para eliminar el artículo del
carrito). El enlace creado debe tener este código:
<a href="" class="delete"></a>
*/
let enlace = document.createElement("a");
let imagen = div.querySelector("img");
enlace.setAttribute("href","");
enlace.className="delete";
div.insertBefore(enlace, imagen);
   
/*
o Añade la copia creada al principio del contenedor de artículos comprados del carrito
(elemento con id cart_items).
*/
let carritoCompra = document.getElementById("cart_items");
carritoCompra.appendChild(div);   

// o Resta 1 al stock del primer artículo de la lista.

let contador = 0;
let resta1 = document.querySelector("#i1 > .stock");
contador++;
resta1.innerHTML="Stock " + (MAX_NUM_ART-contador); 

//contador=10; //descomentando esto se comprueaba el caso del stock 0 de abajo

/*
Resta 1 al número de artículos disponibles (stock) del primer artículo. 
Si después de disminuir el stock no quedan más artículos disponibles, le añadiremos al
 elemento de la clase stock del artículo la clase agotado. Esto hará que el stock aparezca tachado. 
 Comprueba esta funcionalidad poniendo 1 al stock del primer artículo antes de cargar la página.
 */

if(contador === 10) {
    resta1.textContent="Stock 0";
    resta1.className="agotado";
    resta1.style.textDecoration="line-through";
    resta1.style.display="block";
    resta1.style.textAlign="center";
    resta1.style.fontSize="14px";
    resta1.style.letterSpacing="-1";
    resta1.style.fontWeight="bold";
}
 
/*
Incrementa en 1 el número de artículos comprados. Para acceder al valor que contiene un input,
 puedes utilizar la propiedad value (es de lectura/escritura).
*/

let incrementaArtComprados = document.getElementById("citem");
incrementaArtComprados.value=0;
incrementaArtComprados.value++;
incrementaArtComprados.style.fontSize="14px";

//Actualiza el precio total de la compra sumándole el precio del artículo.
let precioCompra = document.getElementById("cprice");
precioCompra.value=20;
precioCompra.style.fontSize="14px";

})();