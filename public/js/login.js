
window.onload = ()=>{
    if(localStorage.getItem('usuario') && localStorage.getItem('usuario')){
        inputUser.value = localStorage.getItem('usuario');
        inputPassword.value = localStorage.getItem('password');
        chkRemember.checked = true;
    }
    inputUser.focus();
    btnIngresar.addEventListener('click',login);
    //salir.addEventListener('click',alert('saliendo'));
}

function login(){
    if(inputUser.value == ''){
        alert('El campo usuario es obligatorio');
    }
    else if(inputPassword.value == ''){
        alert('El campo password es obligatorio');
    }
    else{
        var form = new FormData();
        form.append("user",inputUser.value.toLowerCase());
        form.append("pass",inputPassword.value.toLowerCase());
        fetch( uriRoot+"Login/Ingresar" , {
            method : "post",
            body : form
        })
            .then( r => r.json() )
            .then( data => console.log(data) )
            .catch( e => console.error( "No se pudo conectar con el servidor" ) );
    }
}

function adminIngreso(data) {
    if(data == 0){
        alert('Usuario o password errado');
    }
    else if(data == 1){
        alert('Usuario inactivo');
    }
    else{
        alert('Bienvenido '+ data);
        localStorage.setItem('usuario',inputUser.value.toLowerCase());
        localStorage.setItem('password',inputPassword.value.toLowerCase());
        location.href = 'http://localhost/xgeniusapp/Home';
    }
}

