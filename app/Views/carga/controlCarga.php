<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-12 col-md-12">
                <table id="tblMovimientos" class="display">
                    <thead>
                    <tr >
                        <th>Id</th>
                        <th>Id conductor</th>
                        <th>Id camion</th>
                        <th>Id finca</th>
                        <th>Conductor</th>
                        <th>Camion</th>
                        <th>Finca</th>
                        <th>Acciones</th>
                        <th>Ingresar</th>
                        <th>Salir</th>
                        <th>Cerrar</th>
                    </tr>
                    </thead>
                    <tbody id="tblBody">

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Id conductor</th>
                        <th>Id camion</th>
                        <th>Id finca</th>
                        <th>Conductor</th>
                        <th>Camion</th>
                        <th>Finca</th>
                        <th>Acciones</th>
                        <th>Ingresar</th>
                        <th>Salir</th>
                        <th>Cerrar</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <form class="form-inline" id="formControlCargas" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" id="idConductor" name="idConductor">
            <input type="hidden" id="idCamion" name="idCamion">
            <input type="hidden" id="idFinca" name="idFinca">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="txtConductor" class="sr-only">Conductor</label>
                    <input type="text" class="form-control" id="txtConductor" name="txtConductor" placeholder="Conductor" list="listConductores">
                    <datalist id="listConductores"></datalist>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="txtVehiculo" class="sr-only">Vehículo</label>
                    <input type="text" class="form-control" id="txtVehiculo" name="txtVehiculo" placeholder="Vehículo" list="listVehiculos">
                    <datalist id="listVehiculos"></datalist>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="finca" class="sr-only">Finca</label>
                    <input type="text" class="form-control" id="finca" placeholder="Finca" list="listFinca">
                    <datalist id="listFinca"></datalist>
                </div>
            <div class="form-group mx-sm-3 mb-2">
                <button type="button" id="btnIngresar" class="btn btn-success mb-2">Ingresar</button>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <button type="button" id="btnSalir" class="btn btn-danger mb-2">Salir</button>
            </div>
        </form>
    </div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <table id="tblConductores" class="display">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Licencia</th>
                    <th>Cargar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Licencia</th>
                    <th>Cargar</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col- col-md-6">
            <table id="tblCamiones" class="display">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>Soat</th>
                    <th>Cargar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>Soat</th>
                    <th>Cargar</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
