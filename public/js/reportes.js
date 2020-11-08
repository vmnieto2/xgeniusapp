var fechaMov = document.getElementById("txtFechaMovimiento");

window.onload = ()=>{
    var fechaActual = new Date();
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1;
    var anho = fechaActual.getFullYear();

    if(dia<10){
        dia='0'+dia; //agrega cero si el menor de 10
    }
    if(mes<10){
        mes='0'+mes
    }
    fechaMov.value = anho + "-" + mes + "-" + dia;

    cargarMovimientos(fechaMov.value);

    fechaMov.onchange = function () {
        cargarMovimientos(fechaMov.value);
    }
}

function cargarMovimientos(fec) {
    var table = $('#tblReportes').DataTable( {
        "destroy" : true,
        "scrollX" : true,
        dom: 'flrtip',
        "order": [[ 1, 'asc' ], [ 6, 'asc' ]],
        "ajax": uriRoot+"Carga/ReporteMovimientos/"+fec,
        "columnDefs": [
            {
                "className": "dt-center",
                "targets": [0,1,2,3,4,5,6]
            },

        ],
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }
        ],
        "columns": [
            { "data": "Id" },
            { "data": "Conductor" },
            { "data": "Camion" },
            { "data": "Finca" },
            { "data": "Movimiento" },
            { "data": "Acciones" },
            { "data": "Hora Accion" }
        ]
    } );

    $("#export").on("click",function(){
        table.buttons('.buttons-excel').trigger();
    })
}


