<?php namespace App\Controllers;
use App\Models\UsuariosModel;
session_start();
class Carga extends BaseController
{


    function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builderConductores = $db->table('conductores');
        $this->builderCamiones = $db->table('camiones');
        $this->builderMovimientos = $db->table('movimientos_carga_fincas');
    }

    public function index()
    {
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Control de carga';
            echo view('estructura/header',$data);
            echo view('carga/menuCarga');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }


    }

    public function Control(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Control de carga';
            $data['css'][] = "https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css";
            $data['css'][] = Base_url().'/public/css/jquery.dataTables.min.css';
            $data['css'][] = Base_url().'/public/css/tablas.css';
            $data['script'][] = Base_url().'/public/js/jquery.dataTables.min.js';
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js";
            $data['script'][] = Base_url().'/public/js/controlCarga.js';
            echo view('estructura/header',$data);
            echo view('carga/controlCarga');
            echo view('estructura/footer',$data);
        }else{
            return view('loginfolder/login');
        }
    }

    public function Reportes(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Control de carga';
            $data['css'][] = "https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css";
            $data['css'][] = Base_url().'/public/css/jquery.dataTables.min.css';
            $data['css'][] = Base_url().'/public/css/tablas.css';
            $data['css'][] = Base_url().'/public/css/reportes.css';
            $data['script'][] = Base_url().'/public/js/jquery.dataTables.min.js';
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js";
            $data['script'][] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js";
            $data['script'][] = "https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js";
            $data['script'][] = Base_url().'/public/js/reportes.js';
            echo view('estructura/header',$data);
            echo view('carga/reportes');
            echo view('estructura/footer',$data);
        }else{
            return view('loginfolder/login');
        }
    }

    public function ListadoMovimientos(){
        $this->builderMovimientos->join("conductores", "conductor_id");
        $this->builderMovimientos->join("camiones", "camion_id");
        $this->builderMovimientos->join("fincas", "finca_id");
        $this->builderMovimientos->where("movimiento_estado", 0);

        $query   = $this->builderMovimientos->get();
        $array = [];
        foreach ($query->getResult() as $result){
            $mov_id = $result->movimiento_id;
            if ($result->movimiento_tipo == 1){
                $inputFinca = '<input type="text" class="form-control" id="txtFincaTbl'.$mov_id.'" name="txtFincaTbl" value="'.$result->finca_nombre.'" readonly>';
                $btnIngresar = '<button disabled><i class="fa fa-arrow-up" aria-hidden="true"></i></button>';
                $btnSalir = '<button onclick="saleCamionTbl(\''.$mov_id.'\', \''.$result->conductor_id.'\', \''.$result->camion_id.'\', \''.$result->finca_id.'\')"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>';
            }else{
                $inputFinca = '<input type="text" onchange="validarFincaTbl(this)" class="form-control" id="txtFincaTbl'.$result->movimiento_id.'" name="txtFincaTbl" value="'.$result->finca_nombre.'" list="listFinca">';
                $btnSalir = '<button disabled><i class="fa fa-arrow-down" aria-hidden="true"></i></button>';
                $btnIngresar = '<button onclick="entraCamionTbl(\''.$mov_id.'\', \''.$result->conductor_id.'\', \''.$result->camion_id.'\')"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>';
            }
            $arr = array(
                'Id'=> $mov_id,
                'Id conductor'=> $result->conductor_id,
                'Id camion'=> $result->camion_id,
                'Id finca'=> '<input type="text" id="idFincaTbl'.$mov_id.'" value="'.$result->finca_id.'" style="width: 30px;" readonly >',
                'Conductor' => $result->conductor_nombre,
                'Camion' => $result->camion_placa,
                'Finca' =>
                    $inputFinca,
                'Acciones'=>
                    '<textarea class="form-control" id="areaAccionesTbl'.$mov_id.'" data-length="200" maxlength="200">'.$result->movimiento_acciones.'</textarea>',
                'Ingresar'=>
                    $btnIngresar,
                'Salir'=>
                    $btnSalir,
                'Cerrar'=>
                    '<a onclick="BorrarMovimiento(\''.$mov_id.'\', \''.$result->conductor_id.'\', \''.$result->camion_id.'\')" class="btn btn-danger" href="#" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>');
            $array[] = $arr;
        }
        $data = ["data"=>$array];
        echo json_encode($data);

    }

    public function ListadoConductores(){
        $this->builderConductores->getWhere(['conductor_estado' => 1]);
        $this->builderMovimientos->where('movimiento_estado', 0);
        $mov = $this->builderMovimientos->get();
        foreach ($mov->getResultArray() as $movRow){
            $array[] = $movRow['conductor_id'];
        }
        $query = $this->builderConductores->whereNotIn('conductor_id',$array);

        //echo var_dump($query->get()->getResult());die;

        $array = [];
        foreach ($query->get()->getResultArray() as $result){
            //echo var_dump($result['conductor_id']);die;
            $arr = array(
                'Id'=> $result['conductor_id'],
                'Nombre' => $result['conductor_nombre'],
                'Licencia'=>$result['conductor_vencimiento_licencia'],
                'Cargar'=>
                    '<button type="button" class="btn btn-primary" onclick="cargarInputConductor(\''.$result['conductor_id'].'\',\''.$result['conductor_nombre'].'\')">Seleccionar</button>');
            $array[] = $arr;
        }
        $data = ["data"=>$array];
        echo json_encode($data);

    }

    public function ListadoCamiones(){
        $this->builderCamiones->getWhere(['camion_estado' => 1]);
        $this->builderMovimientos->where('movimiento_estado', 0);

        $mov = $this->builderMovimientos->get();
        foreach ($mov->getResultArray() as $movRow){
            $array[] = $movRow['camion_id'];
        }
        $query = $this->builderCamiones->whereNotIn('camion_id',$array);

        $array = [];
        foreach ($query->get()->getResultArray() as $result){
            $arr = array(
                'Id'=> $result['camion_id'],
                'Placa' => $result['camion_placa'],
                'Soat'=>$result['camion_soat_vencimiento'],
                'Cargar'=>
                    '<button type="button" class="btn btn-primary" onclick="cargarInputCamion(\''.$result['camion_id'].'\',\''.$result['camion_placa'].'\')">Seleccionar</button>');
            $array[] = $arr;
        }
        $data = ["data"=>$array];
        echo json_encode($data);
    }

    public function Ingresar(){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "conductor_id" => strtoupper($this->request->getVar('idConductor')),
                "camion_id" => strtoupper($this->request->getVar('idCamion')),
                "finca_id" => strtoupper($this->request->getVar('idFinca')),
                "movimiento_tipo" => 1,
                "movimiento_estado" => 0
            ];



            $query = $this->builderMovimientos->insert($datos);

            if (isset($query) && !is_null($query) ){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function Salir(){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "conductor_id" => strtoupper($this->request->getVar('idConductor')),
                "camion_id" => strtoupper($this->request->getVar('idCamion')),
                "finca_id" => strtoupper($this->request->getVar('idFinca')),
                "movimiento_tipo" => 0,
                "movimiento_estado" => 0
            ];


            $query = $this->builderMovimientos->insert($datos);
            if (isset($query) && !is_null($query) ){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    //Esta función se trae de la BD todos los nombres de los conductores
    public function getConductores(){
        $cond = $this->builderConductores->get();
        echo json_encode($cond->getResultArray());
    }

    //Esta función valida que no pongan un conductor diferente al de la BD
    public function validarConductores(){
        $cond = $this->request->getVar('cond');
        $this->builderConductores->where('conductor_nombre', $cond);
        $result = $this->builderConductores->get()->getResult();
        echo json_encode($result);
    }


    //Esta función se trae de la BD todos los nombres de las placas de los camiones
    public function getCamiones(){
        $cam = $this->builderCamiones->get();
        echo json_encode($cam->getResultArray());
    }

    //Esta función valida que no pongan un camion diferente al de la BD
    public function validarCamiones(){
        $camion = $this->request->getVar('camiones');
        $this->builderCamiones->where('camion_placa', $camion);
        $result = $this->builderCamiones->get()->getResult();
        echo json_encode($result);
    }

    public function entraCamionTbl($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "conductor_id" => $this->request->getVar('co'),
                "camion_id" => $this->request->getVar('ca'),
                "finca_id" => $this->request->getVar('fi'),
                "movimiento_acciones" => $this->request->getVar('acciones'),
                "movimiento_tipo" => 1,
                "movimiento_estado" => 0
            ];
            $this->updEntraCamion($id);
            $query = $this->builderMovimientos->insert($datos);
            if (isset($query) && !is_null($query) ){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function updEntraCamion($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "movimiento_estado" => 1
            ];
            $query = $this->builderMovimientos->where('movimiento_id', $id);
            if (isset($query) && !is_null($query) ){
                $this->builderMovimientos->update($datos);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function saleCamionTbl($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "conductor_id" => $this->request->getVar('co'),
                "camion_id" => $this->request->getVar('ca'),
                "finca_id" => $this->request->getVar('fi'),
                "movimiento_acciones" => $this->request->getVar('acciones'),
                "movimiento_tipo" => 0,
                "movimiento_estado" => 0
            ];
            $this->updSaleCamion($id);
            $query = $this->builderMovimientos->insert($datos);
            if (isset($query) && !is_null($query) ){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function updSaleCamion($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "movimiento_estado" => 1
            ];
            $query = $this->builderMovimientos->where('movimiento_id', $id);
            if (isset($query) && !is_null($query) ){
                $this->builderMovimientos->update($datos);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function BorrarMovimiento($id){
        if($_SESSION['usuario_nombre']){
            $datos = [
                "movimiento_estado" => 1
            ];

            $query = $this->builderMovimientos->where('movimiento_id', $id);
            if (isset($query) && !is_null($query) ){
                $this->builderMovimientos->update($datos);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return view('loginfolder/login');
        }
    }

    public function ReporteMovimientos($fechaMov){
        $this->builderMovimientos->join("conductores", "conductor_id");
        $this->builderMovimientos->join("camiones", "camion_id");
        $this->builderMovimientos->join("fincas", "finca_id");
        $this->builderMovimientos->like("movimiento_fecha", $fechaMov.'%');
        $this->builderMovimientos->orderBy("conductor_nombre", "ASC");
        $this->builderMovimientos->orderBy("movimiento_fecha", "ASC");
        $query   = $this->builderMovimientos->get();
        $array = [];
        foreach ($query->getResult() as $result){
            if ($result->movimiento_tipo == 1){
                $movimiento = "ENTRÓ";
            }elseif ($result->movimiento_tipo == 0){
                $movimiento = "SALIÓ";
            }
            $mov_id = $result->movimiento_id;
            $arr = array(
                'Id'=> $mov_id,
                'Conductor' => $result->conductor_nombre,
                'Camion' => $result->camion_placa,
                'Finca' => $result->finca_nombre,
                'Movimiento' => $movimiento,
                'Acciones' => $result->movimiento_acciones,
                'Hora Accion' => $result->movimiento_fecha);
            $array[] = $arr;
        }
        $data = ["data"=>$array];
        echo json_encode($data);

    }


}