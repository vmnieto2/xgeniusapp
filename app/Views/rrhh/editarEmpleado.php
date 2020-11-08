
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <form id="formActualizar" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="hId" id="hId">
                <input type="hidden" name="hDpto" id="hDpto">
                <input type="hidden" name="hCiudad" id="hCiudad">
                <input type="hidden" name="hCargo" id="hCargo">
                <input type="hidden" name="hArl" id="hArl">
                <input type="hidden" name="hEps" id="hEps">
                <input type="hidden" name="hFinca" id="hFinca">
                <h4>ACTUALIZACIÓN DE DATOS</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label for="txtCedula">Cédula:</label>
                        <input type="number" class="form-control" id="txtCedula" name="txtCedula" placeholder="Cédula" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtPriApe">Primer Apellido:</label>
                        <input type="text" class="form-control" id="txtPriApe" name="txtPriApe" placeholder="Primer Apellido" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtSegApe">Segundo Apellido:</label>
                        <input type="text" class="form-control" id="txtSegApe" name="txtSegApe" placeholder="Segundo Apellido" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtPriNom">Primer Nombre:</label>
                        <input type="text" class="form-control" id="txtPriNom" name="txtPriNom" placeholder="Primer Nombre" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtSegNom">Segundo Nombre:</label>
                        <input type="text" class="form-control" id="txtSegNom" name="txtSegNom" placeholder="Segundo Nombre" autocomplete="off">
                    </div>


                    <div class="col-md-3 col-sm-12">
                        <label for="selectGenero">Género:</label>
                        <select class="form-control" name="selectGenero" id="selectGenero">
                            <option value="0">Seleccione género</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="selectEC">Estado Civil</label>
                        <select class="form-control" name="selectEC" id="selectEC">
                            <option value="0">Seleccione estado civil</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaNac">Fecha Nacimiento:</label>
                        <input type="date" class="form-control" id="txtFechaNac" name="txtFechaNac">
                    </div>


                    <div class="col-md-3 col-sm-12">
                        <label for="txtDireccion">Dirección:</label>
                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtBarrio">Barrio:</label>
                        <input type="text" class="form-control" id="txtBarrio" name="txtBarrio" placeholder="Barrio" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="selectDpto">Departamento Residencia</label>
                        <input type="text" class="form-control" id="selectDpto" name="selectDpto" list="listDpto" autocomplete="off">
                        <datalist id="listDpto"></datalist>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtCiudad">Ciudad Residencia:</label>
                        <input type="text" class="form-control" id="txtCiudad" name="txtCiudad" list="listCiudad" autocomplete="off">
                        <datalist id="listCiudad"></datalist>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtCorreo">Correo:</label>
                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" autocomplete="off">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtCargo">Cargo:</label>
                        <input type="text" class="form-control" name="txtCargo" id="txtCargo" list="listCargos" autocomplete="off">
                        <datalist id="listCargos"></datalist>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="selectArl">ARL:</label>
                        <input type="text" class="form-control" id="selectArl" name="selectArl" list="listArl" autocomplete="off">
                        <datalist id="listArl"></datalist>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="selectEps">EPS:</label>
                        <input type="text" class="form-control" id="selectEps" name="selectEps" list="listEps" autocomplete="off">
                        <datalist id="listEps"></datalist>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaContrato">Fecha Contrato:</label>
                        <input type="date" class="form-control" id="txtFechaContrato" name="txtFechaContrato">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaVencSuper">Vc/miento Superintendencia:</label>
                        <input type="date" class="form-control" id="txtFechaVencSuper" name="txtFechaVencSuper">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="selectTipoCurso">Tipo de curso:</label>
                        <select class="form-control" id="selectTipoCurso" name="selectTipoCurso">
                            <option value="0">Seleccione curso</option>
                            <option value="1">VIGILANTE</option>
                            <option value="2">SUPERVISOR</option>
                            <option value="3">MEDIOS TECNOLÓGICOS</option>
                            <option value="4">ESCOLTA</option>
                            <option value="5">MANEJO DEFENSIVO</option>
                            <option value="6">GUIA CANINO</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaVencPsicofisico">Vc/miento psicofisico:</label>
                        <input type="date" class="form-control" id="txtFechaVencPsicofisico" name="txtFechaVencPsicofisico">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaVencLicencia">Vc/miento licencia conducir:</label>
                        <input type="date" class="form-control" id="txtFechaVencLicencia" name="txtFechaVencLicencia">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaCursoManeDefen">Curso manejo defensivo:</label>
                        <input type="date" class="form-control" id="txtFechaCursoManeDefen" name="txtFechaCursoManeDefen">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaConceptoOcupacional">Concepto ocupacional:</label>
                        <input type="date" class="form-control" id="txtFechaConceptoOcupacional" name="txtFechaConceptoOcupacional">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFechaEntregaDotacion">Entrega Dotación:</label>
                        <input type="date" class="form-control" id="txtFechaEntregaDotacion" name="txtFechaEntregaDotacion">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="txtFinca">Finca:</label>
                        <input type="text" class="form-control" id="txtFinca" name="txtFinca" list="listFinca" autocomplete="off">
                        <datalist id="listFinca"></datalist>
                    </div>

                </div>

                <div style="margin-top: 20px" class="row">

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="fotoPerfil" name="fotoPerfil">
                        <label class="custom-file-label" for="fotoPerfil">Foto Perfil</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="cedulaPdf" name="cedulaPdf">
                        <label class="custom-file-label" for="cedulaPdf">Cédula</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="ruafPdf" name="ruafPdf">
                        <label class="custom-file-label" for="ruafPdf">Ruaf</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="psicofisicoPdf" name="psicofisicoPdf">
                        <label class="custom-file-label" for="psicofisicoPdf">Psicofísico</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="saludOcupacionalPdf" name="saludOcupacionalPdf">
                        <label class="custom-file-label" for="saludOcupacionalPdf">Salud ocupacional</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="pruebaAlcoholPdf" name="pruebaAlcoholPdf">
                        <label class="custom-file-label" for="pruebaAlcoholPdf">Prueba Alcohol</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="ultimoDesprendiblePdf" name="ultimoDesprendiblePdf">
                        <label class="custom-file-label" for="ultimoDesprendiblePdf">Último Desprendible</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="cursoEntrenamientoPdf" name="cursoEntrenamientoPdf">
                        <label class="custom-file-label" for="cursoEntrenamientoPdf">Curso Entrenamiento</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="tratamientoDatosPdf" name="tratamientoDatosPdf">
                        <label class="custom-file-label" for="tratamientoDatosPdf">Tratamiento Datos</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="parafiscalesPdf" name="parafiscalesPdf">
                        <label class="custom-file-label" for="parafiscalesPdf">Parafiscales</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="hojaVidaPdf" name="hojaVidaPdf">
                        <label class="custom-file-label" for="hojaVidaPdf">Hoja de Vida</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="covidPdf" name="covidPdf">
                        <label class="custom-file-label" for="covidPdf">Covid</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="acreditacionPdf" name="acreditacionPdf">
                        <label class="custom-file-label" for="acreditacionPdf">Acreditación</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="capacitacionPrimPdf" name="capacitacionPrimPdf">
                        <label class="custom-file-label" for="capacitacionPrimPdf">Capacitación Prim</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="dotacionPdf" name="dotacionPdf">
                        <label class="custom-file-label" for="dotacionPdf">Dotación</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="libretamilitarPdf" name="libretamilitarPdf">
                        <label class="custom-file-label" for="libretamilitarPdf">Libreta Militar</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="capacitacionPdf" name="capacitacionPdf">
                        <label class="custom-file-label" for="capacitacionPdf">Capacitación</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="estiloVidaPdf" name="estiloVidaPdf">
                        <label class="custom-file-label" for="estiloVidaPdf">Estilo de Vida</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="seguridadVialPdf" name="seguridadVialPdf">
                        <label class="custom-file-label" for="seguridadVialPdf">Seguridad Vial</label>
                    </div>

                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="horasExtrasPdf" name="horasExtrasPdf">
                        <label class="custom-file-label" for="horasExtrasPdf">Horas Extras</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <div class="custom-file col-md-6 col-sm-12">
                        <input type="file" class="custom-file-input" id="contratoPdf" name="contratoPdf">
                        <label class="custom-file-label" for="contratoPdf">Contrato</label>
                    </div>
                </div>

                <div style="margin-top: 20px" class="row">
                    <button type="button" id="btnActualizar" class="btn btn-success">Actualizar</button>
                </div>
            </form>


        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="h3Modal">Por favor espere...</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="imgModal" src="<?php echo Base_url(); ?>/public/img/clock.gif" class="img-fluid mx-auto d-block" alt="">
                </div>
                <div class="modal-footer" id="divBtnModal">

                </div>
            </div>
        </div>
    </div>




