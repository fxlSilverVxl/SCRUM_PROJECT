function cambiarBotones() {
    var estado = document.getElementById('estado').value;
    var botonListo = document.getElementById('botonListo');
    var botonEntregado = document.getElementById('botonEntregado');
    console.log(estado);
    if (estado === 'tomado') {
    botonListo.style.display = 'none';
    botonEntregado.style.display = 'block';
    } else {
    botonListo.style.display = 'block';
    botonEntregado.style.display = 'none';
    }
}
