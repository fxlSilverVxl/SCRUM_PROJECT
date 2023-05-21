var productosID = 12
const productos = [
    {
        presio: 30,
        id: 1,
        title: "Torta de bistec",
        estado: activo
    },
    {
        presio: 35,
        id: 2,
        title: "Torta de chorizo",
        estado: activo
    },
    {
        presio: 35,
        id: 3,
        title: "Torta de pastor",
        estado: activo
    },
    {
        presio: 35,
        id: 4,
        title: "Torta de Jamon",
        estado: activo
    },
    {
        presio:40,
        id: 5,
        title: "Torta de lomo",
        estado: activo
    },
    {
        presio:40,
        id: 6,
        title: "Torta de pierna",
        estado: activo
    },
    {
        presio: 40,
        id: 7,
        title: "Pizza individual",
        estado: activo
    },
    {
        presio: 30,
        id: 8,
        title: "Torta de chilaquiles",
        estado: activo
    },
    {
        presio: 10,
        id: 9,
        title: "Taco de bistec",
        estado: activo
    },
    {
        presio: 10,
        id: 10,
        title: "Taco de chorizo",
        estado: activo
    },
    {
        presio: 10,
        id: 11,
        title: "Taco de pastor",
        estado: activo
    }
]

function insertarProducto (precio, titulo, est){
    let temp = {
        presio: precio,
        id: productosID,
        title: titulo,
        estado: est
    }
    productos.push(temp);
}