<?php namespace App\Controllers;
use App\Models\UsuariosModel;
session_start();
class Rrhh extends BaseController
{

    //Acá cargamos todas las tablas de la base de datos con las que vamos a interactuar.
    function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builderEmpleados = $db->table('empleados');
        $this->builderEstadoCivil = $db->table('estado_civil');
        $this->builderCargos = $db->table('cargos');
        $this->builderArl = $db->table('arl');
        $this->builderEps = $db->table('eps');
        $this->builderDptos = $db->table('departamentos');
        $this->builderCiudades = $db->table('ciudades');
        $this->builderFincas = $db->table('fincas');
    }

    //Acá llamamos al menú.
    public function index()
    {
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Recursos Humanos';
            echo view('estructura/header',$data);
            echo view('rrhh/menuRrhh');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }


    }

    //Acá llamamos la vista del registro del empleado
    public function Contratacion()
    {
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Contratación RRHH';
            $data['script'][] = Base_url().'/public/js/contratacion.js';
            echo view('estructura/header',$data);
            echo view('rrhh/contratacion');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }
    }

    public function Listado(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Listado RRHH';
            $data['css'][] = Base_url().'/public/css/jquery.dataTables.min.css';
            $data['css'][] = Base_url().'/public/css/tablas.css';
            $data['script'][] = Base_url().'/public/js/jquery.dataTables.min.js';
            $data['script'][] = Base_url().'/public/js/listadoRrhh.js';
            echo view('estructura/header',$data);
            echo view('rrhh/listado');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }
    }

    public function ListadoEmpleados(){
        $this->builderEmpleados->join('cargos', 'cargo_id');
        $this->builderEmpleados->join('fincas', 'finca_id');
        $query   = $this->builderEmpleados->getWhere(['empleado_estado' => 1]);
        $array = [];
        foreach ($query->getResult() as $result){
            $arr = array($id = $result->empleado_id,
                'Id'=> $result->empleado_id,
                'Cédula'=> $result->cedula,
                'Nombre' => $result->primer_nombre." ". $result->primer_apellido,
                'Cargo'=>$result->cargo_nombre,
                'Finca'=>$result->finca_nombre,
                'Ver'=> '<a class="btn btn-primary" target="_blank" href='.Base_url().'/Rrhh/VerEmpleado/'.$result->empleado_id.'><i class="fa fa-eye"></i></a>',
                'Editar'=> '<a class="btn btn-success" target="_blank" href='.Base_url().'/Rrhh/EditarEmpleado/'.$result->empleado_id.'><i class="fa fa-edit"></i></a>',
                'Borrar'=> '<a class="btn btn-danger" href="#" onclick="confirmarBorrado('.$id.')"><i class="fa fa-times-circle" aria-hidden="true"></i></a>');
            $array[] = $arr;
        }
        $data = ["data"=>$array];
        echo json_encode($data);
    }

    public function VerEmpleado(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Ver RRHH';
            $data['script'][] = Base_url().'/public/js/verEmpleado.js';
            echo view('estructura/header',$data);
            echo view('rrhh/verEmpleado');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }
    }

    public function VerEmpleadoDetalles($id){
        if($_SESSION['usuario_nombre']){
            $this->builderEmpleados->join('estado_civil', 'estado_civil_id');
            $this->builderEmpleados->join('ciudades', 'ciudad_id');
            $this->builderEmpleados->join('departamentos', 'departamento_id');
            $this->builderEmpleados->join('cargos', 'cargo_id');
            $this->builderEmpleados->join('arl', 'arl_id');
            $this->builderEmpleados->join('eps', 'eps_id');
            $this->builderEmpleados->join('fincas', 'finca_id');
            $query   = $this->builderEmpleados->getWhere(['empleado_id' => $id]);
            echo json_encode($query->getResultArray()[0]);
        }else{
            return view('loginfolder/login');
        }
    }

    public function EditarEmpleado(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Editar RRHH';
            $data['script'][] = Base_url().'/public/js/editarEmpleado.js';
            echo view('estructura/header',$data);
            echo view('rrhh/editarEmpleado');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }
    }

    public function BorrarEmpleado($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "empleado_estado" => 0
            ];
            $query = $this->builderEmpleados->where('empleado_id', $id);
            if (isset($query) && !is_null($query) ){
                $this->builderEmpleados->update($datos);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    //Acá realizamos el guardado del empleado a la BD
    public function Guardar(){
        if($_SESSION['usuario_nombre']){
            $empresaId = $_SESSION['empresa_id'];
            $fechaServidor = date('Y-m-d G:i:s');
          $datos = [
                "cedula" => $this->request->getVar('txtCedula'),
                "primer_apellido" => strtoupper($this->request->getVar('txtPriApe')),
                "segundo_apellido" => strtoupper($this->request->getVar('txtSegApe')),
                "primer_nombre" => strtoupper($this->request->getVar('txtPriNom')),
                "segundo_nombre" => strtoupper($this->request->getVar('txtSegNom')),
                "genero" => $this->request->getVar('selectGenero'),
                "estado_civil_id" => $this->request->getVar('selectEC'),
                "fecha_nacimiento" => $this->request->getVar('txtFechaNac'),
                "direccion" => strtoupper($this->request->getVar('txtDireccion')),
                "barrio" => strtoupper($this->request->getVar('txtBarrio')),
                "ciudad_id" => $this->request->getVar('hCiudad'),
                "correo" => $this->request->getVar('txtCorreo'),
                "telefono" => $this->request->getVar('txtTelefono'),
                "cargo_id" => $this->request->getVar('hCargo'),
                "arl_id" => $this->request->getVar('hArl'),
                "eps_id" => $this->request->getVar('hEps'),
                "fecha_contrato" => $this->request->getVar('txtFechaContrato'),
                "fecha_vencimiento_super" => $this->request->getVar('txtFechaVencSuper'),
                "tipo_curso" => $this->request->getVar('selectTipoCurso'),
                "fecha_vencimiento_psicofisico" => $this->request->getVar('txtFechaVencPsicofisico'),
                "fecha_vencimiento_licencia" => $this->request->getVar('txtFechaVencLicencia'),
                "curso_manejo_defensivo" => $this->request->getVar('txtFechaCursoManeDefen'),
                "concepto_ocupacional" => $this->request->getVar('txtFechaConceptoOcupacional'),
                "entrega_dotacion" => $this->request->getVar('txtFechaEntregaDotacion'),
                "finca_id" => $this->request->getVar('hFinca'),
                "empresa_id" => $empresaId,
                "fecha_servidor" => $fechaServidor
            ];

            $query = $this->builderEmpleados->insert($datos);
            if (isset($query) && !is_null($query) ){
                $ced = $this->request->getVar('txtCedula');
                $this->actualizarDocs($ced);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }

    }

    public function Actualizar(){
        if($_SESSION['usuario_nombre']){
            $empleadoId = $this->request->getVar('hId');
            $datos = [
                "cedula" => $this->request->getVar('txtCedula'),
                "primer_apellido" => strtoupper($this->request->getVar('txtPriApe')),
                "segundo_apellido" => strtoupper($this->request->getVar('txtSegApe')),
                "primer_nombre" => strtoupper($this->request->getVar('txtPriNom')),
                "segundo_nombre" => strtoupper($this->request->getVar('txtSegNom')),
                "genero" => $this->request->getVar('selectGenero'),
                "estado_civil_id" => $this->request->getVar('selectEC'),
                "fecha_nacimiento" => $this->request->getVar('txtFechaNac'),
                "direccion" => strtoupper($this->request->getVar('txtDireccion')),
                "barrio" => strtoupper($this->request->getVar('txtBarrio')),
                "ciudad_id" => $this->request->getVar('hCiudad'),
                "correo" => $this->request->getVar('txtCorreo'),
                "telefono" => $this->request->getVar('txtTelefono'),
                "cargo_id" => $this->request->getVar('hCargo'),
                "arl_id" => $this->request->getVar('hArl'),
                "eps_id" => $this->request->getVar('hEps'),
                "fecha_contrato" => $this->request->getVar('txtFechaContrato'),
                "fecha_vencimiento_super" => $this->request->getVar('txtFechaVencSuper'),
                "tipo_curso" => $this->request->getVar('selectTipoCurso'),
                "fecha_vencimiento_psicofisico" => $this->request->getVar('txtFechaVencPsicofisico'),
                "fecha_vencimiento_licencia" => $this->request->getVar('txtFechaVencLicencia'),
                "curso_manejo_defensivo" => $this->request->getVar('txtFechaCursoManeDefen'),
                "concepto_ocupacional" => $this->request->getVar('txtFechaConceptoOcupacional'),
                "entrega_dotacion" => $this->request->getVar('txtFechaEntregaDotacion'),
                "finca_id" => $this->request->getVar('hFinca')
            ];

            $this->builderEmpleados->where('empleado_id', $empleadoId);
            $query = $this->builderEmpleados->update($datos);

            if (isset($query) && !is_null($query) ){
                $ced = $this->request->getVar('txtCedula');
                $this->actualizarDocs($ced);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    //Esta función realiza un Update que se llama desde el guardado
    //que guarda los pdfs actualizando el registro
    public function actualizarDocs($ced){
        $target_path_Foto = "./public/documentos/foto_perfil/";
        $rutaFoto = $target_path_Foto . basename($ced) . ".jpg";
        $data = [
            'foto_perfil_pdf' => $rutaFoto
        ];
        if(move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $rutaFoto)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }

        $target_path_Ced = "./public/documentos/cedula/";
        $rutaCed = $target_path_Ced. basename($ced) . ".pdf";
        $data = [
            'cedula_pdf' => $rutaCed
        ];
        if(move_uploaded_file($_FILES['cedulaPdf']['tmp_name'], $rutaCed)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_Ruaf = "./public/documentos/ruaf/";
        $rutaRuaf = $target_path_Ruaf. basename($ced) . ".pdf";
        $data = [
            'ruaf_pdf' => $rutaRuaf
        ];
        if(move_uploaded_file($_FILES['ruafPdf']['tmp_name'], $rutaRuaf)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }

        $target_path_Psico = "./public/documentos/psicofisico/";
        $rutaPsico = $target_path_Psico. basename($ced) . ".pdf";
        $data = [
            'psicofisico_pdf' => $rutaPsico
        ];
        if(move_uploaded_file($_FILES['psicofisicoPdf']['tmp_name'], $rutaPsico)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_SO = "./public/documentos/salud_ocupacional/";
        $rutaSO = $target_path_SO. basename($ced) . ".pdf";
        $data = [
            'salud_ocupacional_pdf' => $rutaSO
        ];
        if(move_uploaded_file($_FILES['saludOcupacionalPdf']['tmp_name'], $rutaSO)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_PruebaAlcohol = "./public/documentos/prueba_alcohol/";
        $rutaPruebaAlcohol = $target_path_PruebaAlcohol. basename($ced) . ".pdf";
            $data = [
                'prueba_alcohol_pdf' => $rutaPruebaAlcohol
            ];
        if(move_uploaded_file($_FILES['pruebaAlcoholPdf']['tmp_name'], $rutaPruebaAlcohol)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_Desprendible = "./public/documentos/ultimo_desprendible/";
        $rutaDesprendible = $target_path_Desprendible. basename($ced) . ".pdf";
        $data = [
            'ult_desprendible_pdf' => $rutaDesprendible
        ];
        if(move_uploaded_file($_FILES['ultimoDesprendiblePdf']['tmp_name'], $rutaDesprendible)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_Curso = "./public/documentos/curso_entrenamiento/";
        $rutaCurso = $target_path_Curso. basename($ced) . ".pdf";
            $data = [
                'curso_entrenamiento_pdf' => $rutaCurso
            ];
        if(move_uploaded_file($_FILES['cursoEntrenamientoPdf']['tmp_name'], $rutaCurso)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_Tratamiento = "./public/documentos/tratamiento_datos/";
        $rutaTratamiento = $target_path_Tratamiento. basename($ced) . ".pdf";
            $data = [
                'tratamiento_pdf' => $rutaTratamiento
            ];
        if(move_uploaded_file($_FILES['tratamientoDatosPdf']['tmp_name'], $rutaTratamiento)){
            $this->builderEmpleados->where('cedula', $ced);
            $this->builderEmpleados->update($data);
        }


        $target_path_Parafiscales = "./public/documentos/parafiscales/";
        $rutaParafiscales = $target_path_Parafiscales. basename($ced) . ".pdf";
            $data = [
                'parafiscales_pdf' => $rutaParafiscales
            ];
            if(move_uploaded_file($_FILES['parafiscalesPdf']['tmp_name'], $rutaParafiscales)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }


        $target_path_HojaVida = "./public/documentos/hoja_de_vida/";
        $rutaHojaVida = $target_path_HojaVida. basename($ced) . ".pdf";
            $data = [
                'hoja_de_vida_pdf' => $rutaHojaVida
            ];
            if(move_uploaded_file($_FILES['hojaVidaPdf']['tmp_name'], $rutaHojaVida)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }


        $target_path_Covid = "./public/documentos/covid/";
        $rutaCovid = $target_path_Covid. basename($ced) . ".pdf";
            $data = [
                'covid_pdf' => $rutaCovid
            ];
            if(move_uploaded_file($_FILES['covidPdf']['tmp_name'], $rutaCovid)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_Acreditacion = "./public/documentos/acreditacion/";
        $rutaAcreditacion = $target_path_Acreditacion. basename($ced) . ".pdf";
            $data = [
                'acreditacion_pdf' => $rutaAcreditacion
            ];
            if(move_uploaded_file($_FILES['acreditacionPdf']['tmp_name'], $rutaAcreditacion)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_CapPrim = "./public/documentos/capacitacion_prim/";
        $rutaCapPrim = $target_path_CapPrim. basename($ced) . ".pdf";
            $data = [
                'capacitacion_prim_pdf' => $rutaCapPrim
            ];
            if(move_uploaded_file($_FILES['capacitacionPrimPdf']['tmp_name'], $rutaAcreditacion)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_Dotacion = "./public/documentos/dotacion/";
        $rutaDotacion = $target_path_Dotacion. basename($ced) . ".pdf";
            $data = [
                'dotacion_pdf' => $rutaDotacion
            ];
            if(move_uploaded_file($_FILES['dotacionPdf']['tmp_name'], $rutaDotacion)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_LibretaMilitar = "./public/documentos/libreta_militar/";
        $rutaLibretaMilitar = $target_path_LibretaMilitar. basename($ced) . ".pdf";
            $data = [
                'libreta_militar_pdf' => $rutaLibretaMilitar
            ];
            if(move_uploaded_file($_FILES['libretamilitarPdf']['tmp_name'], $rutaLibretaMilitar)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }


        $target_path_Cap = "./public/documentos/capacitacion/";
        $rutaCap = $target_path_Cap. basename($ced) . ".pdf";
            $data = [
                'capacitacion_pdf' => $rutaCap
            ];
            if(move_uploaded_file($_FILES['capacitacionPdf']['tmp_name'], $rutaCap)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }


        $target_path_EstiloVida = "./public/documentos/estilo_de_vida/";
        $rutaEstiloVida = $target_path_EstiloVida. basename($ced) . ".pdf";
            $data = [
                'estilo_vida_pdf' => $rutaEstiloVida
            ];
            if(move_uploaded_file($_FILES['estiloVidaPdf']['tmp_name'], $rutaEstiloVida)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_SegVial = "./public/documentos/seguridad_vial/";
        $rutaSegVial = $target_path_SegVial. basename($ced) . ".pdf";
            $data = [
                'seguridad_vial_pdf' => $rutaSegVial
            ];
            if(move_uploaded_file($_FILES['seguridadVialPdf']['tmp_name'], $rutaSegVial)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

        $target_path_HrsExtras = "./public/documentos/horas_extras/";
        $rutaHrsExtras = $target_path_HrsExtras. basename($ced) . ".pdf";

            $data = [
                'horas_extras_pdf' => $rutaHrsExtras
            ];
            if(move_uploaded_file($_FILES['horasExtrasPdf']['tmp_name'], $rutaHrsExtras)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }


        $target_path_Contrato = "./public/documentos/contrato/";
        $rutaContrato = $target_path_Contrato. basename($ced) . ".pdf";
            $data = [
                'contrato_pdf' => $rutaContrato
            ];
            if(move_uploaded_file($_FILES['contratoPdf']['tmp_name'], $rutaContrato)){
                $this->builderEmpleados->where('cedula', $ced);
                $this->builderEmpleados->update($data);
            }

    }

    //Esta función valida que la cedula que ingresen ya exista y no lo vuelvan a registrar
    public function validarCedula(){
        $ced = $this->request->getVar('ceds');
        $this->builderEmpleados->where('cedula', $ced);
        $cedula = $this->builderEmpleados->get()->getResult()[0]->cedula;
        if ($cedula){
            $result = 1;
        }else{
            $result = 0;
        }
        echo json_encode($result);
    }

    //Esta función se trae de la BD todos los nombres de la tabla estado civil
    public function getEstadoCivil(){
        $estados = $this->builderEstadoCivil->get();
        echo json_encode($estados->getResultArray());
    }

    //Esta función se trae de la BD todos los nombres de la tabla cargos
    public function getCargos(){
        $cargos = $this->builderCargos->get();
        echo json_encode($cargos->getResultArray());
    }

    //Esta función valida que no pongan un cargo diferente al de la BD
    public function validarCargos(){
        $cargo = $this->request->getVar('cargos');
        $this->builderCargos->where('cargo_nombre',$cargo);
        $result = $this->builderCargos->get()->getResult();
        echo json_encode($result);
    }

    //Esta función se trae de la BD todos los nombres de la tabla arl
    public function getArl(){
        $arl = $this->builderArl->get();
        echo json_encode($arl->getResultArray());
    }

    //Esta función valida que no pongan una arl diferente al de la BD
    public function validarArl(){
        $arl = $this->request->getVar('arls');
        $this->builderArl->where('arl_nombre',$arl);
        $result = $this->builderArl->get()->getResult();
        echo json_encode($result);
    }

    //Esta función se trae de la BD todos los nombres de la tabla eps
    public function getEps(){
        $eps = $this->builderEps->get();
        echo json_encode($eps->getResultArray());
    }

    //Esta función valida que no pongan una eps diferente al de la BD
    public function validarEps(){
        $eps = $this->request->getVar('epss');
        $this->builderEps->where('eps_nombre',$eps);
        $result = $this->builderEps->get()->getResult();
        echo json_encode($result);
    }


    //Esta función se trae de la BD todos los nombres de la tabla departamentos
    public function getDptos(){
        $dpto = $this->builderDptos->get();
        echo json_encode($dpto->getResultArray());
    }

    //Esta función valida que no pongan una departamento diferente al de la BD
    public function validarDpto(){
        $dpto = $this->request->getVar('dpto');
        $this->builderDptos->where('departamento_nombre',$dpto);
        $id = $this->builderDptos->get()->getResult()[0]->departamento_id;
        if ($id){
            $this->builderCiudades->where('departamento_id',$id);
            $result = $this->builderCiudades->get()->getResultArray();
        }else{
            $result = 0;
        }
        echo json_encode($result);
    }

    //Esta función valida que no pongan una ciudad diferente al de la BD
    public function validarCiudad(){
        $dpto = $this->request->getVar('dpto');
        $ciu = $this->request->getVar('ciu');
        $this->builderCiudades->join('departamentos', 'departamento_id');
        $this->builderCiudades->where('departamento_nombre',$dpto);
        $this->builderCiudades->where('ciudad_nombre',$ciu);
        $id = $this->builderCiudades->get()->getResult()[0]->ciudad_id;
        if ($id){
            $result = $id;
        }else{
            $result = 0;
        }
        echo json_encode($result);
    }


}