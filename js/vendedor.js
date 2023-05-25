let carrito = {}
const cards = document.getElementById('cards')
const items = document.getElementById('items')
const footer = document.getElementById('footer')
const templateCard = document.getElementById('template-card').content
const templateFooter = document.getElementById('template-footer').content
const templateCarrito = document.getElementById('template-carrito').content
const fragment = document.createDocumentFragment()

var pedido = [];
var historico = [];
var noPedido = 200;

document.addEventListener('DOMContentLoaded', e => {
    cargaDatosBD()
    if(localStorage.getItem('carrito')){ 
        carrito = JSON.parse(localStorage.getItem('carrito'))
        pintarCarrito();
    }
}) 

cards.addEventListener('click', e => {
    // console.log('e', e)
    addCarrito(e)
})

items.addEventListener('click', e => {
    btnAcciones(e)
})

const btnAcciones = e => {
    if(e.target.classList.contains('adding')){
        let producto = carrito[e.target.dataset.id]
        producto.cantidad++
        carrito[e.target.dataset.id] = {...producto}
        pintarCarrito();
    }
    if(e.target.classList.contains('removing')){
        let producto = carrito[e.target.dataset.id]
        producto.cantidad--
        if(producto.cantidad === 0){
            delete carrito[e.target.dataset.id]
        } else {
            carrito[e.target.dataset.id] = {...producto}
        }
        pintarCarrito();
    }
    localStorage.setItem('carrito', JSON.stringify(carrito))
    e.stopPropagation()
}

const addCarrito = e => {
    if(e.target.classList.contains('btn-add')) {
        setCarrito(e.target.parentElement)
        localStorage.setItem('carrito', JSON.stringify(carrito))
    }
    e.stopPropagation()
}

const setCarrito = item => {
    const producto = {
        id: item.querySelector('button').dataset.id,
        title: item.querySelector('h5').textContent,
        presio: item.querySelector('p').textContent,
        cantidad: 1
    }
    if(carrito.hasOwnProperty(producto.id)){
        producto.cantidad = carrito[producto.id].cantidad + 1
    }

    carrito[producto.id] = {...producto}
    pintarCarrito();
    // console.log('producto', producto)
}

const pintarCarrito = () => {
    // console.log('items', items)
    items.innerHTML = ''
    pedido.length = 0;
    var n = 0
    Object.values(carrito).forEach(producto => {
        pedido[n] = {
            id: producto.id,
            title: producto.title,
            cantidad: producto.cantidad,
            subTotal: producto.cantidad * producto.presio                                                              
        }
        
        templateCarrito.querySelector('th').textContent = producto.id
        templateCarrito.querySelectorAll('td')[0].textContent = producto.title
        templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad
        templateCarrito.querySelector('span').textContent = producto.cantidad * producto.presio
        
        
        //* Agregat ID a los botones
        templateCarrito.querySelector('.btn-success').dataset.id = producto.id
        templateCarrito.querySelector('.btn-danger').dataset.id = producto.id
        
        const clone = templateCarrito.cloneNode(true)
        fragment.appendChild(clone)
        n++;
    })
    let total = 0;
    pedido.forEach(item => total += item.subTotal)
    pedido.total = total;

    items.appendChild(fragment)
    pintarFooter()

    console.log(pedido)
}

const pintarFooter = () => {
    footer.innerHTML = '';
    if (Object.keys(carrito).length === 0) {
        footer.innerHTML = 
        `
            <th scope="row" colspan="5">
                Sin pedido
            </th>
        `
        return
    }

    const nCantidad = Object.values(carrito).reduce((acc, {cantidad}) =>
        acc + cantidad
    , 0)
    const nPrecio = Object.values(carrito).reduce((acc, {cantidad, presio}) =>
        acc + (cantidad * presio)
    , 0)
    // console.log(nCantidad, nPrecio
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio
    const clone = templateFooter.cloneNode(true)
    fragment.appendChild(clone)
    footer.appendChild(fragment)

    const botonE = document.    querySelector('#vaciar-carrito')
    botonE.addEventListener('click', () => {
        carrito = {}
        localStorage.setItem('carrito', JSON.stringify(carrito))
        pintarCarrito()
    })

//! IMPORTANTE REVISAR
    //!! const botonD = document.querySelector('#enviar-pedido')
    //!! botonD.addEventListener('click', () => {
    //!!     for (var i = 0; i < pedido.length; i++) {
    //!!         historico.unshift(pedido[i]);
    //!!     }
    //!!     // historico[noPedido-200].concat(pedido);
    //!!     console.log(historico)
    //!!     noPedido++;
    //!!     pedido.length = 0;
    //!!     carrito = {}
    //!!     localStorage.setItem('carrito', JSON.stringify(carrito))
    //!!     pintarCarrito()
    //!! })
}

const cargaDatosBD = async () =>  {
    const res = await fetch('../db/api.json')
    const data = await res.json()
    pintarCards(data) 
    // console.log('Respuesta', data)
}

const pintarCards = (data) => {
    data.forEach (item =>{
        // console.log(item)
        templateCard.querySelector('h5').textContent = item.title
        templateCard.querySelector('p').textContent = item.presio
        templateCard.querySelector('button').dataset.id = item.id
        const clone =  templateCard.cloneNode(true)
        fragment.appendChild(clone)
    })
    cards.appendChild(fragment)
}