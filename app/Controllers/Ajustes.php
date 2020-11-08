<?php namespace App\Controllers;
use App\Models\UsuariosModel;
session_start();
class Ajustes extends BaseController
{


    function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builderConductores = $db->table('conductores');
        $this->builderCamiones = $db->table('camiones');
        $this->builderMovimientos = $db->table('movimientos_carga_fincas');
    }

    public function index(){
        if($_SESSION['usuario_nombre']){
            $data['title'] = 'Modulo de Ajustes';
            echo view('estructura/header',$data);
            echo view('ajustes/menuAjustes');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }
    }


}


