var uriRoot = "http://localhost/xgeniusapp/";
var url = window.location.href;
url = url.split('/');
var id = url[6];
if(id){
    id = id.split('#');
    id = id[0];
}


function salir(){
    fetch( uriRoot+"Login/salir" , {
        method : "post"
    })
        .then( r => r.json() )
        .then( data => adminSalir(data) )
        .catch( e => console.error( "No se pudo conectar con el servidor" ) );
}

function adminSalir(data){
    if(data){
        location.href = 'http://localhost/xgeniusapp';
    }
}