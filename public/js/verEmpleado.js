
window.onload = ()=>{
  $('.alert').alert()
  getEmpleado();
}

function getEmpleado(){
  fetch(uriRoot+"Rrhh/VerEmpleadoDetalles/"+id)
      .then(response => response.json())
      .then(data => existeEmpleado(data));
}

function existeEmpleado(data){
  fecha = new Date();
  if (data){
    if (data.foto_perfil_pdf == '' || data.foto_perfil_pdf == null){
      imgFoto.innerHTML = '<img src="'+uriRoot+'public/img/usuario.png?'+ fecha +'"style="height: 150px; width: 150px; border-radius: 20px; border-color: #212529; border: solid; border-width: 2px; ">'
    }else {
      imgFoto.innerHTML = '<img src="'+uriRoot+ data.foto_perfil_pdf +'?'+fecha+'" class="card-img-top" style="height: 200px; width: 150px; border-radius: 20px; border-color: #212529; border: solid; border-width: 2px;">'
    }

    txtCedula.value = data.cedula
    txtPriApe.value = data.primer_apellido
    txtSegApe.value = data.segundo_apellido
    txtPriNom.value = data.primer_nombre
    txtSegNom.value = data.segundo_nombre
    
    if (data.genero == 1){
      selectGenero.value = "MASCULINO"
    }else{
      selectGenero.value = "FEMENINO"
    }

    if (data.estado_civil_id == 1){
      selectEC.value = "SOLTERO"
    }else if (data.estado_civil_id == 2){
      selectEC.value = "CASADO"
    }else if (data.estado_civil_id == 3){
      selectEC.value = "UNION LIBRE"
    }else if (data.estado_civil_id == 4){
      selectEC.value = "VIUDO"
    }else if (data.estado_civil_id == 5){
      selectEC.value = "DIVORCIADO"
    }else if (data.estado_civil_id == 6){
      selectEC.value = "SEPARADO"
    }

    txtFechaNac.value = data.fecha_nacimiento
    txtDireccion.value = data.direccion
    txtBarrio.value = data.barrio
    txtCiudad.value = data.ciudad_nombre
    txtCorreo.value = data.correo
    txtTelefono.value = data.telefono
    txtCargo.value = data.cargo_nombre
    selectArl.value = data.arl_nombre
    selectEps.value = data.eps_nombre
    txtFechaContrato.value = data.fecha_contrato
    txtFechaVencSuper.value = data.fecha_vencimiento_super

    if (data.tipo_curso == 1){
      selectTipoCurso.value = "VIGILANTE"
    }else if (data.tipo_curso == 2){
      selectTipoCurso.value = "SUPERVISOR"
    }else if (data.tipo_curso == 3){
      selectTipoCurso.value = "MEDIOS TECNOLÓGICOS"
    }else if (data.tipo_curso == 4){
      selectTipoCurso.value = "ESCOLTA"
    }else if (data.tipo_curso == 5){
      selectTipoCurso.value = "MANEJO DEFENSIVO"
    }else if (data.tipo_curso == 6){
      selectTipoCurso.value = "GUIA CANINO"
    }

    txtFechaVencPsicofisico.value = data.fecha_vencimiento_psicofisico
    txtFechaVencLicencia.value = data.fecha_vencimiento_licencia
    txtFechaCursoManeDefen.value = data.curso_manejo_defensivo
    txtFechaConceptoOcupacional.value = data.concepto_ocupacional
    txtFechaEntregaDotacion.value = data.entrega_dotacion
    txtFinca.value = data.finca_nombre

    if (data.cedula_pdf == '' || data.cedula_pdf == null){
      alertCedula.classList.add("alert-danger");
      alertCedula.innerHTML = "No hay cédula"
    }else{
      alertCedula.classList.add("alert-success");
      alertCedula.innerHTML = '<a href="'+uriRoot+ data.cedula_pdf +'?'+fecha+ '" target="_blank">Descargar Cédula</a>'
    }

    if (data.ruaf_pdf == '' || data.ruaf_pdf == null){
      alertRuaf.classList.add("alert-danger");
      alertRuaf.innerHTML = "No hay Ruaf"
    }else{
      alertRuaf.classList.add("alert-success");
      alertRuaf.innerHTML = '<a href="'+uriRoot+ data.ruaf_pdf +'?'+fecha+ '" target="_blank">Descargar Ruaf</a>'
    }

    if (data.psicofisico_pdf == '' || data.psicofisico_pdf == null){
      alertPsico.classList.add("alert-danger");
      alertPsico.innerHTML = "No hay Psicofísico"
    }else{
      alertPsico.classList.add("alert-success");
      alertPsico.innerHTML = '<a href="'+uriRoot+ data.psicofisico_pdf +'?'+fecha+ '" target="_blank">Descargar Psicofísico</a>'
    }

    if (data.salud_ocupacional_pdf == '' || data.salud_ocupacional_pdf == null){
      alertSO.classList.add("alert-danger");
      alertSO.innerHTML = "No hay Salud Ocupacional"
    }else{
      alertSO.classList.add("alert-success");
      alertSO.innerHTML = '<a href="'+uriRoot+ data.salud_ocupacional_pdf +'?'+fecha+ '" target="_blank">Descargar Salud Ocupacional</a>'
    }

    if (data.prueba_alcohol_pdf == '' || data.prueba_alcohol_pdf == null){
      alertAlcohol.classList.add("alert-danger");
      alertAlcohol.innerHTML = "No hay Prueba de Alcohol"
    }else{
      alertAlcohol.classList.add("alert-success");
      alertAlcohol.innerHTML = '<a href="'+uriRoot+ data.prueba_alcohol_pdf +'?'+fecha+ '" target="_blank">Descargar Prueba de Alcohol</a>'
    }

    if (data.ult_desprendible_pdf == '' || data.ult_desprendible_pdf == null){
      alertDesprendible.classList.add("alert-danger");
      alertDesprendible.innerHTML = "No hay Último Desprendible"
    }else{
      alertDesprendible.classList.add("alert-success");
      alertDesprendible.innerHTML = '<a href="'+uriRoot+ data.ult_desprendible_pdf +'?'+fecha+ '" target="_blank">Descargar Último Desprendible</a>'
    }

    if (data.curso_entrenamiento_pdf == '' || data.curso_entrenamiento_pdf == null){
      alertCurso.classList.add("alert-danger");
      alertCurso.innerHTML = "No hay Curso Entrenamiento"
    }else{
      alertCurso.classList.add("alert-success");
      alertCurso.innerHTML = '<a href="'+uriRoot+ data.curso_entrenamiento_pdf +'?'+fecha+ '" target="_blank">Descargar Curso Entrenamiento</a>'
    }

    if (data.tratamiento_pdf == '' || data.tratamiento_pdf == null){
      alertTratamiento.classList.add("alert-danger");
      alertTratamiento.innerHTML = "No hay Tratamiento de Datos"
    }else{
      alertTratamiento.classList.add("alert-success");
      alertTratamiento.innerHTML = '<a href="'+uriRoot+ data.tratamiento_pdf +'?'+fecha+ '" target="_blank">Descargar Tratamiento de Datos</a>'
    }

    if (data.parafiscales_pdf == '' || data.parafiscales_pdf == null){
      alertParafiscales.classList.add("alert-danger");
      alertParafiscales.innerHTML = "No hay Parafiscales"
    }else{
      alertParafiscales.classList.add("alert-success");
      alertParafiscales.innerHTML = '<a href="'+uriRoot+ data.parafiscales_pdf +'?'+fecha+ '" target="_blank">Descargar Parafiscales</a>'
    }

    if (data.hoja_de_vida_pdf == '' || data.hoja_de_vida_pdf == null){
      alertHojaVida.classList.add("alert-danger");
      alertHojaVida.innerHTML = "No hay Hoja de Vida"
    }else{
      alertHojaVida.classList.add("alert-success");
      alertHojaVida.innerHTML = '<a href="'+uriRoot+ data.hoja_de_vida_pdf +'?'+fecha+'" target="_blank">Descargar Hoja de Vida</a>'
    }

    if (data.covid_pdf == '' || data.covid_pdf == null){
      alertCovid.classList.add("alert-danger");
      alertCovid.innerHTML = "No hay Prueba de Covid"
    }else{
      alertCovid.classList.add("alert-success");
      alertCovid.innerHTML = '<a href="'+uriRoot+ data.covid_pdf +'?'+fecha+'" target="_blank">Descargar Prueba de Covid</a>'
    }

    if (data.acreditacion_pdf == '' || data.acreditacion_pdf == null){
      alertAcreditacion.classList.add("alert-danger");
      alertAcreditacion.innerHTML = "No hay Acreditación"
    }else{
      alertAcreditacion.classList.add("alert-success");
      alertAcreditacion.innerHTML = '<a href="'+uriRoot+ data.acreditacion_pdf +'?'+fecha+'" target="_blank">Descargar Acreditación</a>'
    }

    if (data.capacitacion_prim_pdf == '' || data.capacitacion_prim_pdf == null){
      alertCapPrim.classList.add("alert-danger");
      alertCapPrim.innerHTML = "No hay Capacitación Prim"
    }else{
      alertCapPrim.classList.add("alert-success");
      alertCapPrim.innerHTML = '<a href="'+uriRoot+ data.capacitacion_prim_pdf +'?'+fecha+'" target="_blank">Descargar Capacitación Prim</a>'
    }

    if (data.dotacion_pdf == '' || data.dotacion_pdf == null){
      alertDotacion.classList.add("alert-danger");
      alertDotacion.innerHTML = "No hay Dotación"
    }else{
      alertDotacion.classList.add("alert-success");
      alertDotacion.innerHTML = '<a href="'+uriRoot+ data.dotacion_pdf +'?'+fecha+'" target="_blank">Descargar Dotación</a>'
    }

    if (data.libreta_militar_pdf == '' || data.libreta_militar_pdf == null){
      alertLibMil.classList.add("alert-danger");
      alertLibMil.innerHTML = "No hay Libreta Militar"
    }else{
      alertLibMil.classList.add("alert-success");
      alertLibMil.innerHTML = '<a href="'+uriRoot+ data.libreta_militar_pdf +'?'+fecha+'" target="_blank">Descargar Libreta Militar</a>'
    }

    if (data.capacitacion_pdf == '' || data.capacitacion_pdf == null){
      alertCap.classList.add("alert-danger");
      alertCap.innerHTML = "No hay Capacitación"
    }else{
      alertCap.classList.add("alert-success");
      alertCap.innerHTML = '<a href="'+uriRoot+ data.capacitacion_pdf +'?'+fecha+'" target="_blank">Descargar Capacitación</a>'
    }

    if (data.estilo_vida_pdf == '' || data.estilo_vida_pdf == null){
      alertEstiloVida.classList.add("alert-danger");
      alertEstiloVida.innerHTML = "No hay Estilo de Vida"
    }else{
      alertEstiloVida.classList.add("alert-success");
      alertEstiloVida.innerHTML = '<a href="'+uriRoot+ data.estilo_vida_pdf +'?'+fecha+'" target="_blank">Descargar Estilo de Vida</a>'
    }

    if (data.seguridad_vial_pdf == '' || data.seguridad_vial_pdf == null){
      alertSegVial.classList.add("alert-danger");
      alertSegVial.innerHTML = "No hay Seguridad vial"
    }else{
      alertSegVial.classList.add("alert-success");
      alertSegVial.innerHTML = '<a href="'+uriRoot+ data.seguridad_vial_pdf +'?'+fecha+'" target="_blank">Descargar Seguridad vial</a>'
    }

    if (data.horas_extras_pdf == '' || data.horas_extras_pdf == null){
      alertHrsExtra.classList.add("alert-danger");
      alertHrsExtra.innerHTML = "No hay Horas Extras"
    }else{
      alertHrsExtra.classList.add("alert-success");
      alertHrsExtra.innerHTML = '<a href="'+uriRoot+ data.horas_extras_pdf +'?'+fecha+'" target="_blank">Descargar Horas Extras</a>'
    }

    if (data.contrato_pdf == '' || data.contrato_pdf == null){
      alertContrato.classList.add("alert-danger");
      alertContrato.innerHTML = "No hay Contrato"
    }else{
      alertContrato.classList.add("alert-success");
      alertContrato.innerHTML = '<a href="'+uriRoot+ data.contrato_pdf +'?'+fecha+'" target="_blank">Descargar Contrato</a>'
    }
  }
}