var conductor = document.getElementById("txtConductor");
var vehiculo = document.getElementById("txtVehiculo");

window.onload = ()=>{
    btnIngresar.addEventListener('click',ingresarCamion);
    btnSalir.addEventListener('click',salirCamion);

    cargarConductores();
    cargarCamiones();
    getConductores();
    getCamiones();
    getFinca();
    cargarMovimientos();

    conductor.onchange = function (){
        validarConductores();
    }

    vehiculo.onchange = function (){
        validarCamiones();
    }

    finca.onchange = function () {
        validarFinca();
    }

}

function ingresarCamion(){
    if (conductor.value == ""){
        alert("Debe ingresar un conductor");
    }else if (vehiculo.value == ""){
        alert("Debe ingresar un vehículo");
    }else if (finca.value == ""){
        alert("Debe ingresar una finca");
    }else {
        var url = new FormData(document.getElementById('formControlCargas'));
        fetch( uriRoot+"Carga/Ingresar" , {
            method : "post",
            body : url
        })
            .then( r => r.json() )
            .then( data => console.log(data) )
            .catch( e => console.log(0) );
    }
    idConductor.value = "";
    idCamion.value = "";
    idFinca.value = "";
    txtConductor.value = "";
    txtVehiculo.value = "";
    finca.value = "";
    cargarMovimientos();
    cargarConductores();
    cargarCamiones();

}

function salirCamion(){
    if (conductor.value == ""){
        alert("Debe ingresar un conductor");
    }else if (vehiculo.value == ""){
        alert("Debe ingresar un vehículo");
    }else if (finca.value == ""){
        alert("Debe ingresar una finca");
    }else {
        var url = new FormData(document.getElementById('formControlCargas'));
        fetch( uriRoot+"Carga/Salir" , {
            method : "post",
            body : url
        })
            .then( r => r.json() )
            .then( data => console.log(data) )
            .catch( e => console.log(0) );
    }
    idConductor.value = "";
    idCamion.value = "";
    idFinca.value = "";
    txtConductor.value = "";
    txtVehiculo.value = "";
    finca.value = "";
    cargarMovimientos();
    cargarConductores();
    cargarCamiones();

    //document.getElementById("formControlCargas").reset();
}

function cargarMovimientos() {
    $('#tblMovimientos').DataTable( {
        "destroy" : true,
        "scrollX" : true,
        "ajax": uriRoot+"Carga/ListadoMovimientos",
        "columnDefs": [
            {
                "className": "dt-center",
                "targets": [0,3,4,5,6,7,8,9,10]
            },
            {
                "targets": [1, 2],
                "visible": false
            }
        ],
        "columns": [
            { "data": "Id" },
            { "data": "Id conductor" },
            { "data": "Id camion" },
            { "data": "Id finca" },
            { "data": "Conductor" },
            { "data": "Camion" },
            { "data": "Finca" },
            { "data": "Acciones" },
            { "data": "Ingresar" },
            { "data": "Salir" },
            { "data": "Cerrar" }
        ]
    } );
}

function cargarConductores() {
        // DataTable
    $('#tblConductores').DataTable( {
        "destroy" : true,
        "scrollX" : true,
        "ajax": uriRoot+"Carga/ListadoConductores",
        "columns": [
            { "data": "Id" },
            { "data": "Nombre" },
            { "data": "Licencia" },
            { "data": "Cargar" }
        ]
    } );
}

function cargarCamiones() {
    // DataTable
    $('#tblCamiones').DataTable( {
        "destroy" : true,
        "scrollX" : true,
        "ajax": uriRoot+"Carga/ListadoCamiones",
        "columns": [
            { "data": "Id" },
            { "data": "Placa" },
            { "data": "Soat" },
            { "data": "Cargar" }
        ]
    } );
}

function cargarInputConductor(id,nombre) {
    $("#idConductor").val(id);
    $("#txtConductor").val(nombre);
}

function cargarInputCamion(id,placa) {
    $("#idCamion").val(id);
    $("#txtVehiculo").val(placa);
}

function getFinca(){
    fetch(uriRoot+'Main/getFinca')
        .then(response => response.json())
        .then(data => cargarFinca(data));
}

function cargarFinca(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].finca_nombre+'"></option>';
    }
    listFinca.innerHTML = option;

}

function validarFinca(){
    var url = new FormData();
    url.append('fincas', finca.value)
    fetch( uriRoot+"Main/validarFinca" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeFinca(data) )
        .catch( e => console.error());
}

function existeFinca(data){
    if (data == 0){
        finca.value = ''
        idFinca.value = ''
        finca.focus()
    }else {
        idFinca.value = data[0].finca_id
    }
}

function validarFincaTbl(param){
    var url = new FormData();
    url.append('fincasTbl', param.value)
    fetch( uriRoot+"Main/validarFincaTbl" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeFincaTbl(data, param.id) )
        .catch( e => console.error());
}

function existeFincaTbl(data, id){
    var n = id.split("txtFincaTbl")
    n = n[1]
    var inpDinamic = document.getElementById("idFincaTbl"+n)
    console.log(data)
    console.log(inpDinamic)
    if (data == 0){
        getNombreFinca(inpDinamic,n)
    }else {
        inpDinamic.value = data.finca_id
    }
}

function getNombreFinca(param,n){
    var url = new FormData();
    url.append('idf', param.value)
    fetch( uriRoot+"Main/getNombreFinca" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => cargarNombreFinca(data,n) )
        .catch( e => console.error());
}

function cargarNombreFinca(data, n){
    document.getElementById('txtFincaTbl'+n).value = data.finca_nombre;
}

function getConductores(){
    fetch(uriRoot+'Carga/getConductores')
        .then(response => response.json())
        .then(data =>cargaConductores(data));
}

function cargaConductores(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].conductor_nombre+'"></option>';
    }
    listConductores.innerHTML = option;
}

function validarConductores(){
    var url = new FormData();
    url.append('cond', conductor.value)
    fetch( uriRoot+"Carga/validarConductores" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeConductores(data) )
        .catch( e => console.error());
}

function existeConductores(data){
    if (data == 0){
        conductor.value = ''
        idConductor.value = 0
        conductor.focus()
    }else {
        idConductor.value = data[0].conductor_id
    }
}

function getCamiones(){
    fetch(uriRoot+'Carga/getCamiones')
        .then(response => response.json())
        .then(data =>cargaCamiones(data));
}

function cargaCamiones(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].camion_placa+'"></option>';
    }
    listVehiculos.innerHTML = option;
}

function validarCamiones(){
    var url = new FormData();
    url.append('camiones', vehiculo.value)
    fetch( uriRoot+"Carga/validarCamiones" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeCamiones(data) )
        .catch( e => console.error());
}

function existeCamiones(data){
    if (data == 0){
        vehiculo.value = ''
        idCamion.value = 0
        vehiculo.focus()
    }else {
        idCamion.value = data[0].camion_id
    }
}

function entraCamionTbl(mov, cond, cam){
    //console.log(finca)
    var url = new FormData();
    url.append('co', cond);
    url.append('ca', cam);
    url.append('fi', document.getElementById('idFincaTbl'+mov).value);
    url.append('acciones', document.getElementById('areaAccionesTbl'+mov).value);
    fetch( uriRoot+"Carga/entraCamionTbl/"+mov , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => console.log(data) )
        .catch( e => console.log(0) );

    cargarMovimientos();

}

function saleCamionTbl(mov, cond, cam, finca){
    var url = new FormData();
    url.append('co', cond);
    url.append('ca', cam);
    url.append('fi', finca);
    url.append('acciones', document.getElementById('areaAccionesTbl'+mov).value);
        fetch( uriRoot+"Carga/saleCamionTbl/"+mov , {
            method : "post",
            body : url
        })
            .then( r => r.json() )
            .then( data => console.log(data) )
            .catch( e => console.log(0) );

    cargarMovimientos();

}

function BorrarMovimiento(id){
    var url = new FormData();
    fetch( uriRoot+"Carga/BorrarMovimiento/"+id , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => console.log(data) )
        .catch( e => console.error());

    cargarMovimientos();
    cargarConductores();
    cargarCamiones();
}

