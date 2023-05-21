const path = require('path')
const express = require('express')
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static(path.join(__dirname, 'public')));
app.use('/css', express.static(path.join(__dirname, 'public', 'css')));
app.use('/js', express.static(path.join(__dirname, 'public', 'js')));

const usuarios = [
    {
        type:'administrador',
        password:'1'
    },
    {
        type:'cocina',
        password:'1'
    },
    {
        type:'vendedor',
        password:'1'
    }
]
const redirect = 1;

//* Indica quien esta loggeado
//*     0       -   Nadie (redirecciona a la pantalla de inicio)
//*     1       -   Administrador
//*     2       -   Cocina
//*     3       -   Vendedor
//*     4       -   Log-in Activo
var act = 0;

app.use((req, res, next) => {next()});

app.get('/login', (req, res) => {
    res.sendFile(path.resolve(__dirname, './public/login.html'));
})

app.get('/adminPage', (req, res) => {
    if(act != 1) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, './public/admin.html'));
})

app.get('/kitchenPage', (req, res) => {
    if(act != 2) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, './public/cocinero.html'));
})

app.get('/sellerPage', (req, res) => {
    if(act != 3) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, './public/vendedor.html'));
})

app.get('/orderScreen', (req, res) => {
    res.sendFile(path.resolve(__dirname, './public/pedidos.html'));
})

app.post('/login', (req, res) => {
    const username = req.body.tipo;
    const password = req.body.password;
    
    var type = 'ninguno';

    usuarios.forEach(item => {
        if(item.type == username && item.password == password) {
            type = item.type;
        }
    })
    
    if(type == 'administrador'){
        act = 1;
        res.redirect('/adminPage')
    }
    else if(type == 'cocina') {
        act = 2;
        res.redirect('/kitchenPage')
    }
    else if (type == 'vendedor') {
        act = 3;
        res.redirect('/sellerPage')
    }
    
    //* Lo dejo comentado porque causa un error en la consola
    // res.send('Datos erroneos jaja salu2 🥵🥵🥵🥵')
})

// app.post('/orderScreen', (req, res) => {
//     res.redirect('/orderScreen')
// })

//! ---------- Ruta no encontrada ----------
//! ---------- IMPORTANTE dejar al final de las rutas ----------
app.get('/*', (req, res) => {
    res.status(404).sendFile(path.resolve(__dirname, './public/404.html'));
});

//! ---------- Host listening ----------
const port = process.env.PORT || 3000; 
// const port = 3000; 
app.listen(port, ()=>{
    console.log(`Escuchando en el puerto ${port}...`)
})
//! ---------- Host listening ----------