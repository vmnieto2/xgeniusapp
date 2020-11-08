var cedula = document.getElementById('txtCedula');
var priApe = document.getElementById('txtPriApe');
var segApe = document.getElementById('txtSegApe');
var priNom = document.getElementById('txtPriNom');
var segNom = document.getElementById('txtSegNom');
var genero = document.getElementById('selectGenero');
var estadoCivil = document.getElementById('selectEC');
var fechaNacimiento = document.getElementById('txtFechaNac');
var direccion = document.getElementById('txtDireccion');
var barrio = document.getElementById('txtBarrio');
var dpto = document.getElementById('selectDpto');
var ciudad = document.getElementById('txtCiudad');
var correo = document.getElementById('txtCorreo');
var tel = document.getElementById('txtTelefono');
var cargo = document.getElementById('txtCargo');
var arl = document.getElementById('selectArl');
var eps = document.getElementById('selectEps');
var fechaContrato = document.getElementById('txtFechaContrato');
var fechaVencSuper = document.getElementById('txtFechaVencSuper');
var tipoCurso = document.getElementById('selectTipoCurso');
var fechaVencPsico = document.getElementById('txtFechaVencPsicofisico');
var fechaVencLic = document.getElementById('txtFechaVencLicencia');
var fechaCursoManeDefen = document.getElementById('txtFechaCursoManeDefen');
var fechaConcepOcupa = document.getElementById('txtFechaConceptoOcupacional');
var fechaEntregaDotacion = document.getElementById('txtFechaEntregaDotacion');
var finca = document.getElementById('txtFinca');


window.onload = ()=>{
    cedula.focus();
    btnGuardar.addEventListener('click',guardar);
    getEstadoCivil();
    getCargos();
    getArl();
    getEps();
    getDptos();
    getFinca();

    cedula.onchange = function () {
        validarCedula();
    }
    dpto.onchange = function () {
        validarDpto();
        ciudad.value = ''
    }
    ciudad.onchange = function () {
        validarCiudad();
    }
    eps.onchange = function () {
        validarEps();
    }
    arl.onchange = function () {
        validarArl();
    }
    cargo.onchange = function () {
        validarCargos();
    }
    finca.onchange = function () {
        validarFinca();
    }


}

function guardar() {
    if (cedula.value == ''){
        alert('Por favor ingrese la cédula');
        cedula.focus();
    }else if (priApe.value == ''){
        alert('Por favor ingrese el primer apellido');
        priApe.focus();
    }else if (segApe.value == ''){
        alert('Por favor ingrese el segundo apellido');
        segApe.focus();
    }else if (priNom.value == ''){
        alert('Por favor ingrese el primer nombre');
        priNom.focus();
    }else if (genero.value == 0){
        alert('Por favor escoja un género');
        genero.focus();
    }else if (estadoCivil.value == 0){
        alert('Por favor escoja un estado civil');
        estadoCivil.focus();
    }else if (fechaNacimiento.value == ''){
        alert('Por favor escoja la fecha de nacimiento');
        fechaNacimiento.focus();
    }else if (direccion.value == ''){
        alert('Por favor ingrese la dirección');
        direccion.focus();
    }else if (barrio.value == ''){
        alert('Por favor ingrese el barrio');
        barrio.focus();
    }else if (dpto.value == ''){
        alert('Por favor ingrese el departamento de residencia');
        dpto.focus();
    }else if (ciudad.value == ''){
        alert('Por favor ingrese la ciudad');
        ciudad.focus();
    }else if (correo.value == ''){
        alert('Por favor ingrese el correo');
        correo.focus();
    }else if (cargo.value == ''){
        alert('Por favor ingrese el cargo');
        cargo.focus();
    }else if (arl.value == 0){
        alert('Por favor ingrese la arl');
        arl.focus();
    }else if (eps.value == 0){
        alert('Por favor ingrese la eps');
        eps.focus();
    }else if (tipoCurso.value == 0){
        alert('Por favor ingrese el tipo de curso');
        tipoCurso.focus();
    }else if (finca.value == ''){
        alert('Por favor ingrese la finca');
        finca.focus();
    }else{
        imgModal.src = uriRoot+'public/img/clock.gif';
        $('#myModal').modal()
        var url = new FormData(document.getElementById('formContrato'));
        fetch( uriRoot+"Rrhh/Guardar" , {
            method : "post",
            body : url
        })
            .then( r => r.json() )
            .then( data => respuestaGuardar(data) )
            .catch( e => respuestaGuardar(0) );
    }
}

function respuestaGuardar(data) {
    var btn = document.getElementById('divBtnModal');
    if (data && data == 1){
        h3Modal.innerHTML = 'Registro exitoso.';
        imgModal.src = uriRoot+'public/img/ok.png';
        btn.innerHTML = '<button id="btnModalGuardar" onclick="location.reload()" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>';
    }else{
        h3Modal.innerHTML = 'Fallo en el registro';
        imgModal.src = uriRoot+'public/img/cancelar.png';
        btn.innerHTML = '<button id="btnModalGuardar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'
    }
}

function validarCedula(){
    var url = new FormData();
    url.append('ceds', cedula.value)
    fetch( uriRoot+"Rrhh/validarCedula" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeCedula(data) )
        .catch( e => console.error());
}

function existeCedula(data){
    if (data == 1){
        alert("Esta cédula ya existe.")
        cedula.value = ''
        cedula.focus()
    }
}

function getEstadoCivil(){
    fetch(uriRoot+'Rrhh/getEstadoCivil')
        .then(response => response.json())
        .then(data => cargarEstadoCivil(data));
}

function cargarEstadoCivil(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].estado_civil_id+'">'+data[i].estado_civil_nombre+'</option>';
    }
    estadoCivil.innerHTML = option;
}

function getCargos(){
    fetch(uriRoot+'Rrhh/getCargos')
        .then(response => response.json())
        .then(data => cargarCargos(data));
}

function cargarCargos(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].cargo_nombre+'"></option>';
    }
    listCargos.innerHTML = option;
}

function validarCargos(){
    var url = new FormData();
    url.append('cargos', cargo.value)
    fetch( uriRoot+"Rrhh/validarCargos" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeCargos(data) )
        .catch( e => console.error());
}

function existeCargos(data){
    if (data == 0){
        cargo.value = ''
        hCargo.value = 0
        cargo.focus()
    }else{
        hCargo.value = data[0].cargo_id
    }
}

function getArl(){
    fetch(uriRoot+'Rrhh/getArl')
        .then(response => response.json())
        .then(data => cargarArl(data));
}

function cargarArl(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].arl_nombre+'"></option>';
    }
    listArl.innerHTML = option;
}

function validarArl(){
    var url = new FormData();
    url.append('arls', arl.value)
    fetch( uriRoot+"Rrhh/validarArl" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeArl(data) )
        .catch( e => console.error());
}

function existeArl(data){
    if (data == 0){
        arl.value = ''
        hArl.value = 0
        arl.focus()
    }else{
        hArl.value = data[0].arl_id
    }
}

function getEps(){
    fetch(uriRoot+'Rrhh/getEps')
        .then(response => response.json())
        .then(data => cargarEps(data));
}

function cargarEps(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].eps_nombre+'"></option>';
    }
    listEps.innerHTML = option;
}

function validarEps(){
    var url = new FormData();
    url.append('epss', eps.value)
    fetch( uriRoot+"Rrhh/validarEps" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeEps(data) )
        .catch( e => console.error());
}

function existeEps(data){
    if (data == 0){
        eps.value = ''
        hEps.value = 0
        eps.focus()
    }else {
        hEps.value = data[0].eps_id
    }
}

function getDptos(){
    fetch(uriRoot+'Rrhh/getDptos')
        .then(response => response.json())
        .then(data => cargarDptos(data));
}

function cargarDptos(data){
    option = '';
    for (var i = 0; i < data.length; i++) {
        option += '<option value="'+data[i].departamento_nombre+'"></option>';
    }
    listDpto.innerHTML = option;
}

function validarDpto(){
    var url = new FormData();
    url.append('dpto', dpto.value)
    fetch( uriRoot+"Rrhh/validarDpto" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeDpto(data) )
        .catch( e => console.error());
}

function existeDpto(data){
    if (data == 0){
        dpto.value = ''
        dpto.focus()
    }else {
        listCiudad.innerHTML = '';
        option = '';
        for (var i = 0; i < data.length; i++) {
            option += '<option value="'+data[i].ciudad_nombre+'"></option>';
        }
        listCiudad.innerHTML = option;
    }
}

function validarCiudad(){
    var url = new FormData();
    url.append('dpto', dpto.value);
    url.append('ciu', ciudad.value);
    fetch( uriRoot+"Rrhh/validarCiudad" , {
        method : "post",
        body : url
    })
        .then( r => r.json() )
        .then( data => existeCiudad(data) )
        .catch( e => console.error());
}

function existeCiudad(data){
    if (data == 0){
        ciudad.value = ''
        hCiudad.value = ''
        ciudad.focus()
    }else{
        hCiudad.value = data
    }
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
        hFinca.value = ''
        finca.focus()
    }else {
        hFinca.value = data[0].finca_id
    }
}

