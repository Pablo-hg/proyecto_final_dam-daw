$(document).ready(function(){

    //Sidenav en móviles
    $('.sidenav').sidenav();

});


function abrirDiv(){
    document.getElementById("hola").style.visibility = "visible";
}
function cerraDiv(){
    document.getElementById("hola").style.visibility = "hidden";
}
