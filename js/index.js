var pass = document.getElementById('password');
const loginBTN = document.getElementById('loginBTN')

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

loginBTN.addEventListener('click', (e) => {
    e.preventDefault();

    if(document.getElementById('cocina').checked){
        if(pass.value == usuarios[1].password) window.location.href = "./cocinero.html";
        else alert("Credenciales incorrectas")
    }
    else if(document.getElementById('vendedor').checked){
        if(pass.value == usuarios[2].password) window.location.href = "./caja.html";
        else alert("Credenciales incorrectas")
    }
    else if(document.getElementById('administrador').checked){
        if(pass.value == usuarios[0].password) window.location.href = "./admin.html";
        else alert("Credenciales incorrectas")
    }
})

function pedidosSC(){
    window.location.href = "./pedidos.html";
}