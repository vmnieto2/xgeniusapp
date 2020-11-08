
window.onload = ()=>{
    cargarEmpleados();
    $('#tblEmpleados').DataTable();
}

function cargarEmpleados() {
    // DataTable
    $('#tblEmpleados').DataTable( {
        "ajax": uriRoot+"Rrhh/ListadoEmpleados",
        "columns": [
            { "data": "Id" },
            { "data": "Cédula" },
            { "data": "Nombre" },
            { "data": "Cargo" },
            { "data": "Finca" },
            { "data": "Ver" },
            { "data": "Editar" },
            { "data": "Borrar" }
        ]
    } );
}

function borrar(id){
    var url = new FormData();
    fetch( uriRoot+"Rrhh/BorrarEmpleado/"+id , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => alertBorrado(data) )
        .catch( e => console.error());
}

function confirmarBorrado(data){
    if (data){
        var r = confirm("¿Está seguro que desea borrar a este empleado?")
        if (r == true){
            borrar(data);
        }
    }
}

function alertBorrado(){
    alert("Usuario borrado con exito.");
    location.reload();
}