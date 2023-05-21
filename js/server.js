const path = require('path')
const express = require('express')
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'))

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

//* Indica quien esta loggeado
//*     0       -   Nadie (redirecciona a la pantalla de inicio)
//*     1       -   Administrador
//*     2       -   Cocina
//*     3       -   Vendedor
//*     4       -   Log-in Activo
var act = 0;

app.use((req, res, next) => {next()});

app.get('/login/', (req, res) => {
    res.sendFile(path.resolve(__dirname, '../public/login.html'));
})

app.get('/adminPage', (req, res) => {
    if(act != 1) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, '../public/admin.html'));
})

app.get('/kitchenPage', (req, res) => {
    if(act != 2) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, '../public/cocinero.html'));
})

app.get('/sellerPage', (req, res) => {
    if(act != 3) res.redirect('/login')
    
    res.sendFile(path.resolve(__dirname, '../public/vendedor.html'));
})

app.post('/login/', (req, res) => {
    const username = req.body.tipo;
    const password = req.body.password;
    var encontrado = false;
    
    usuarios.forEach(item => {
        if(item.type == username && item.password == password) {
            if(username == 'administrador'){
                act = 1;
                res.redirect('/adminPage')
            }
            if(username == 'cocina') {
                res.redirect('/kitchenPage/')
                res.sendFile(path.resolve(__dirname, '../vendedor.html'));
                
            }
            if(username == 'vendedor') {
                res.redirect('/sellerPage/')
                res.sendFile(path.resolve(__dirname, '../cocinero.html'));

            } 
        }
    })
})

//! ---------- Ruta no econtrada ----------
//! ---------- IMPORTANTE dejar al final de las rutas ----------
//! Revisar
app.use((req, res, next) => {
    res.status(404).redirect('/404/');
        next();
});

// app.get('/404', (req, res) => {
//     res.status(404).sendFile(path.resolve(__dirname, '../404.html'));
// });


//! ---------- Host listening ----------
const port = process.env.PORT || 3000; 
app.listen(port, ()=>{
    console.log(`Escuchando en el puerto ${port}...`)
})
//! ---------- Host listening ----------