<div class="container">
    <div>
        <h1>Reporte de movimientos <button class="btn btn-success redondo" id="export"><i class="fa fa-file-excel-o"></i></button></h1>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-12 col-sm-12 col-md-3">
            <label for="txtFechaMovimiento">Fecha de Movimiento:</label>
            <input type="date" class="form-control" id="txtFechaMovimiento" name="txtFechaMovimiento">
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-12">
                <table id="tblReportes" class="display">
                    <thead>
                    <tr >
                        <th>Id</th>
                        <th>Conductor</th>
                        <th>Camion</th>
                        <th>Finca</th>
                        <th>Movimiento</th>
                        <th>Acciones</th>
                        <th>Hora Accion</th>
                    </tr>
                    </thead>
                    <tbody id="tblBody">

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Conductor</th>
                        <th>Camion</th>
                        <th>Finca</th>
                        <th>Movimiento</th>
                        <th>Acciones</th>
                        <th>Hora Accion</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
